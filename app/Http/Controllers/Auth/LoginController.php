<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    // ========== GOOGLE ==========
    public function redirectToGoogle()
    {
        
        return Socialite::driver('google')->stateless()->redirect();

    }

    public function handleGoogleCallback()
    {
        
$googleUser = Socialite::driver('google')->stateless()->user();

        $authUser = User::updateOrCreate(
            ['google_id' => $googleUser->id],
            [
                'name'     => $googleUser->name,
                'email'    => $googleUser->email,
                'avatar'   => $googleUser->avatar,
                'password' => bcrypt(Str::random(16)),
            ]
        );

        Auth::login($authUser, true);

        return redirect()->route('welcome');
    }

// ========== GITHUB ==========
public function redirectToGithub()
{
    return Socialite::driver('github')->redirect();
}

public function handleGithubCallback()
{
    try {
        $githubUser = Socialite::driver('github')->user();
    } catch (\Exception $e) {
        return redirect()->route('login')->with('error', 'Error al iniciar sesión con GitHub.');
    }

    // Obtenemos el correo y el ID de GitHub
    $email = $githubUser->getEmail();
    $githubId = $githubUser->getId();

    // Buscamos por github_id primero
    $user = User::where('github_id', $githubId)->first();

    // Si no existe, intentamos por email
    if (!$user && $email) {
        $user = User::where('email', $email)->first();
    }

    // Si el usuario no existe, lo creamos
    if (!$user) {
        $user = User::create([
            'name'      => $githubUser->getName() ?? $githubUser->getNickname(),
            'email'     => $email ?? "no-email-{$githubId}@example.com",
            'github_id' => $githubId,
            'avatar'    => $githubUser->getAvatar(),
            'password'  => bcrypt(Str::random(16)), // contraseña aleatoria
        ]);
    } else {
        // Si el usuario ya existe, actualizamos github_id y avatar si aún no tiene
        if (!$user->github_id) {
            $user->github_id = $githubId;
        }
        if (!$user->avatar && $githubUser->getAvatar()) {
            $user->avatar = $githubUser->getAvatar();
        }
        $user->save();
    }

    // Iniciamos sesión
    Auth::login($user, true);

    return redirect()->route('welcome');
}

public function authenticated(Request $request, $user)
{
    // Guardar el dispositivo desde el que inició sesión
    $device = $request->header('User-Agent');

    if (method_exists($user, 'sessions')) {
        $user->sessions()->create(['device' => $device]);
    }

    return redirect()->route('welcome');
}
// ========== YOUTUBE ==========
public function redirectToYoutube()
{
    return Socialite::driver('google')
        ->scopes(['https://www.googleapis.com/auth/youtube.readonly']) // pedimos permisos de YouTube
        ->redirect();
}

public function handleYoutubeCallback()
{
    try {
        $youtubeUser = Socialite::driver('google')->user();
    } catch (\Exception $e) {
        return redirect()->route('login')->with('error', 'Error al iniciar sesión con YouTube.');
    }

    $email = $youtubeUser->getEmail();
    $googleId = $youtubeUser->getId();

    // Buscar usuario por google_id o email
    $user = User::where('google_id', $googleId)->first();

    if (!$user && $email) {
        $user = User::where('email', $email)->first();
    }

    if (!$user) {
        $user = User::create([
            'name'      => $youtubeUser->getName(),
            'email'     => $email ?? "no-email-{$googleId}@example.com",
            'google_id' => $googleId,
            'avatar'    => $youtubeUser->getAvatar(),
            'password'  => bcrypt(Str::random(16)),
        ]);
    } else {
        // Si el usuario ya existe, actualizamos google_id y avatar si aún no tiene
        if (!$user->google_id) {
            $user->google_id = $googleId;
        }
        if (!$user->avatar && $youtubeUser->getAvatar()) {
            $user->avatar = $youtubeUser->getAvatar();
        }
        $user->save();
    }

    // Iniciar sesión
    Auth::login($user, true);

    return redirect()->route('welcome');
}

}



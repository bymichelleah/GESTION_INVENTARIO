<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;   //  este es el que falta
use Illuminate\Support\Facades\Auth; //  necesario para Auth::login
use App\Models\User;           //  si estás usando User en handleGoogleCallback
use Laravel\Socialite\Facades\Socialite; //  forma recomendada

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $authUser = User::updateOrCreate(
            ['google_id' => $googleUser->id],
            [
                'name'   => $googleUser->name,
                'email'  => $googleUser->email,
                'avatar' => $googleUser->avatar,
            ]
        );

        Auth::login($authUser, true);

        return redirect()->route('welcome');
    }

    public function authenticated(Request $request, $user)
    {
        $device = $request->header('User-Agent');
        $user->sessions()->create(['device' => $device]);

        return redirect()->route('welcome');
    }
}



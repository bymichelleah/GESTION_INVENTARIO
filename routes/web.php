<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use Laravel\Socialite\Facades\Socialite;
=======
use App\Http\Controllers\ProductController;
>>>>>>> Gian

Route::get('/', function () {
    return redirect()->route('products.index');
});

<<<<<<< HEAD
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

// Ruta accesible solo para usuarios autenticados
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
});

// Ruta accesible solo para administradores
Route::middleware(['auth', 'admin'])->get('/admin', function () {
    return view('admin.dashboard');
});
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// GITHUB
Route::get('login/github', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGithub'])->name('auth.github');
Route::get('login/github/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGithubCallback']);
// YouTube Login
Route::get('auth/youtube', [App\Http\Controllers\Auth\LoginController::class, 'redirectToYoutube'])->name('auth.youtube');
Route::get('auth/youtube/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleYoutubeCallback']);




=======
// CRUD para la web
Route::resource('products', ProductController::class);
>>>>>>> Gian

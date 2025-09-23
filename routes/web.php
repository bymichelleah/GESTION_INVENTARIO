<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

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



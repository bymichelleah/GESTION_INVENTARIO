@extends('layouts.app')

@section('styles')
    <!-- Cargar CSS exclusivo para esta vista -->
    @vite(['resources/css/layout/login.css'])
@endsection

@section('content')
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<div class="login-wrapper">
    <div class="login-container">
        <!-- Lado izquierdo con imagen -->
        <div class="login-left">
            {{-- <img src="{{ asset('resources/img/login.jpg') }}" alt="Login Image"> --}}
        </div>

        <!-- Lado derecho con formulario -->
        <div class="login-right">
            <h2 class="login-title">{{ __('Login') }}</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="email" type="email" 
                           class="@error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert" style="color: red; font-size: 12px;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" 
                           class="@error('password') is-invalid @enderror" 
                           name="password" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert" style="color: red; font-size: 12px;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Opciones -->
                <div class="form-options">
                    <div>
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">{{ __('Remember Me') }}</label>
                    </div>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

                <!-- Botón -->
                <button type="submit" class="btn-login">
                    {{ __('Login') }}
                </button>
            </form>

            <!-- Separador -->
             <br>
            <div class="social-divider" style="text-align: center;">
                <span>o ingresa con</span>
            </div>

            <!-- Botones sociales -->
            <div class="social-buttons">
                <!-- GitHub -->
                <a href="{{ route('auth.github') }}" class="btn-social github">
                    <i class="fab fa-github"></i> Iniciar con GitHub
                </a>

                <!-- YouTube (realmente Google con scopes de YouTube)-->
                <a href="{{ route('auth.youtube') }}" class="btn-social youtube">
                    <i class="fab fa-youtube"></i> Iniciar con YouTube
                </a>
            </div>
        </div>
    </div>
</div>
@endsection




@extends('layouts.app')

@section('styles')
    <!-- Cargar CSS exclusivo para esta vista -->
    @vite(['resources/css/layout/login.css'])
@endsection

@section('content')
<div class="login-wrapper">
    <div class="login-container">
        <!-- Lado izquierdo con imagen -->
        <div class="login-left">
            <!-- Si prefieres usar <img> en lugar de background, descomenta abajo -->
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
        </div>
    </div>
</div>
@endsection




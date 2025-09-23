@extends('layouts.app')
@section('styles')
    <!-- Cargar CSS exclusivo para esta vista -->
    @vite(['resources/css/layout/register.css'])
@endsection
@section('content')
<div class="register-wrapper">
    <div class="register-container">
        <!-- Lado izquierdo: Imagen -->
        <div class="register-left">
            <img src="{{ Vite::asset('resources/img/register.jpg') }}" alt="Imagen de registro">
        </div>

        <!-- Lado derecho: Formulario -->
        <div class="register-right">
            <h2 class="register-title">Crear Cuenta</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Correo</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn-register">Registrarse</button>
            </form>
        </div>
    </div>
</div>
@endsection


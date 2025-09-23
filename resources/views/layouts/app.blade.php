<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
<!--Vistas-->
@vite (['resources/css/layout/app.css'])
@yield('styles')
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar">
            <div class="navbar-container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>

                <div class="navbar-links">
                    @guest
                        @if (Route::has('login'))
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @endif

                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <div class="nav-user">
                            <span>{{ Auth::user()->name }}</span>
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </nav>

        <main class="main-content">
            @yield('content')
        </main>
    </div>
</body>
</html>


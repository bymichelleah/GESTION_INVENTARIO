@extends('layouts.app')

@section('styles')
    <!-- Cargar CSS exclusivo para esta vista -->
    @vite(['resources/css/layout/welcome.css'])
@endsection
<!DOCTYPE html>
<html lang="es-pe">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mimitos</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body>
    <header>
        <section class="logo">
            <img src="{{ Vite::asset('resources/img/logo.png') }}" alt="">
        </section>
        <nav class="nav">
            <a href="">Inicio</a>
            <a href="">Ofertas</a>
            <a href="">Productos</a>
            <a href="">Contacto</a>
        </nav>
        <section class="botones">
<a class="iniciar-sesion" href="{{ route('login') }}">Iniciar Sesión</a>
    <a class="registro" href="{{ route('register') }}">Registro</a>
        </section>
    </header>
    <main>
        <section class="banner">
            <img src="{{ Vite::asset('resources/img/banner_original.jpg') }}" alt="">
        </section>

        <section class="ofertas">
            <h2>Ofertas disponibles</h2>
            <div class="ofertas-1">
                <img src="{{ Vite::asset('resources/img/oferta1.PNG') }}" alt="">
                <img src="{{ Vite::asset('resources/img/oferta2.PNG') }}" alt="">
                <img src="{{ Vite::asset('resources/img/oferta3.PNG') }}" alt="">
            </div>
            <div class="ofertas-2">
                <img src="{{ Vite::asset('resources/img/oferta4.PNG') }}" alt="">
                <img src="{{ Vite::asset('resources/img/oferta05.PNG') }}" alt="">
            </div>
        </section>

        <section class="container-productos">
            <h2>Productos destacados</h2>
            <section class="productos">
                <section class="product">
                    <img src="{{ Vite::asset('resources/img/product1.PNG') }}" alt="">
                    <h3>Royal Canin</h3>
                    <P>Croquetas para cachorro</P>
                    <h4>$30.00</h4>
                </section>
                <section class="product">
                    <img src="{{ Vite::asset('resources/img/product1.PNG') }}" alt="">
                    <h3>Royal Canin</h3>
                    <P>Croquetas para cachorro</P>
                    <h4>$30.00</h4>
                </section>
                <section class="product">
                    <img src="{{ Vite::asset('resources/img/product1.PNG') }}" alt="">
                    <h3>Royal Canin</h3>
                    <P>Croquetas para cachorro</P>
                    <h4>$30.00</h4>
                </section>
                <section class="product">
                    <img src="{{ Vite::asset('resources/img/product1.PNG') }}" alt="">
                    <h3>Royal Canin</h3>
                    <P>Croquetas para cachorro</P>
                    <h4>$30.00</h4>
                </section>
            </section>
        </section>
    </main>

    <section id="contacto" class="contacto">
            <div class="contenedor-contacto">
                <!-- Información -->
                <div class="info-contacto">
                    <h2>Contáctanos</h2>
                    <p>Déjanos tu mensaje y te responderemos lo antes posible.</p>
                    <ul>
                        <li><strong>📍 Dirección:</strong> Av. Siempre Viva 123, Lima - Perú</li>
                        <li><strong>📞 Teléfono:</strong> ‪+51 987 654 321‬</li>
                        <li><strong>✉ Correo:</strong> contacto@tuempresa.com</li>
                    </ul>
                </div>

                <!-- Formulario -->
                <div class="formulario-contacto">
                    <form action="#" method="post">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>

                        <label for="correo">Correo</label>
                        <input type="email" id="correo" name="correo" placeholder="Tu correo" required>

                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje..."
                            required></textarea>

                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </section>
    
</body>

</html>

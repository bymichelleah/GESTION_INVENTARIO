<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class=" ">

    <!-- Navbar en la parte superior -->
    <nav class="navbar " style="background-color: #fef6eb;">
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand" href="#">
            <img src="{{ asset('images/mimicrud.png') }}"  alt="Logo Mimitos" 
                width="150" height="70" 
                class="me-4" 
            </a>
        </div>
    </nav>

    <h1 class="container mb-4 mt-5" style="color: #ff6600">Inventario de productos</h1>

    {{-- Mostrar mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Aquí se cargará el contenido de cada vista --}}
    @yield('content')

</body>
</html>

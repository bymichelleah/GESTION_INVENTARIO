@extends('layout')

@section('content')
    

    <form action="{{ route('products.update', $product) }}" method="POST" class="container">
        <h2 class="mb-4">Editar Producto</h2>
        @csrf
        @method('PUT')
        @include('products.form')
        <button class="btn btn-success mt-2" style="background-color: #ff6600; border-color: #ff6600; color: #fff;">Actualizar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
@endsection

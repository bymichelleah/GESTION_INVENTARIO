@extends('layout')

@section('content')
    <h2>Editar Producto</h2>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        @include('products.form')
        <button class="btn btn-success mt-2">Actualizar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
@endsection

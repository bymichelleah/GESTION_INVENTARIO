@extends('layout')

@section('content')

    <form action="{{ route('products.store') }}" method="POST" class="container">
        <h2 class="mb-4">Agregar Producto</h2>
        @csrf
        @include('products.form')
        <button class="btn btn-success mt-2" style="background-color: #ff6600; border-color: #ff6600; color: #fff;">Guardar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
@endsection

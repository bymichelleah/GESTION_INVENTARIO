@extends('layout')

@section('content')
    <h2>Agregar Producto</h2>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        @include('products.form')
        <button class="btn btn-success mt-2">Guardar</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
@endsection

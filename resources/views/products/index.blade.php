@extends('layout')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Agregar Producto</a>
        
        <input type="text" id="searchInput" class="form-control w-25" placeholder="Buscar producto...">
    </div>

    <table class="table table-bordered" id="productsTable">
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Descripción</th>
                <th>Precio</th><th>Categoría</th><th>Marca</th><th>SKU</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center">No hay productos</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- buscador -->
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll("#productsTable tbody tr");

            rows.forEach(row => {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? "" : "none";
            });
        });
    </script>
@endsection

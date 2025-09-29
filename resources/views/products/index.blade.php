@extends('layout')

@section('content')
    <div class="container mb-3">
        <a href="{{ route('products.create') }}" class="btn shadow-sm" style="background-color: #ff6600; border-color: #ff6600; color: #fff;">+ Agregar Producto</a>
    </div>

    <div class="container d-flex justify-content-end mb-3">
        <input type="text" id="searchInput" class="form-control w-25" placeholder="Buscar producto...">
    </div>

    <table class="table-hover table-striped rounded shadow-sm container table table-bordered" id="productsTable">
        <thead class="table-dark">
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

    {{-- FOOTER STICKY --}}
    <footer class="bg-dark text-white text-center py-3 mt-auto w-100" style="position: fixed; bottom: 0; left: 0;">
        <p class="mb-0">© 2025 MIMITOS - Inventario de productos | Desarrollado en Laravel + Bootstrap</p>
    </footer>

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

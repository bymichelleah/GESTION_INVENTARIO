<div class="mb-3">
    <label>Nombre</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Descripción</label>
    <textarea name="description" class="form-control" required>{{ old('description', $product->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Precio</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Categoría</label>
    <input type="text" name="category" class="form-control" value="{{ old('category', $product->category ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Marca</label>
    <input type="text" name="brand" class="form-control" value="{{ old('brand', $product->brand ?? '') }}" required>
</div>
<div class="mb-3">
    <label>SKU</label>
    <input type="text" name="sku" class="form-control" value="{{ old('sku', $product->sku ?? '') }}" required>
</div>

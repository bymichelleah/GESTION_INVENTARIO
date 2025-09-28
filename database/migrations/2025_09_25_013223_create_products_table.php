<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre
            $table->text('description'); // Descripción
            $table->decimal('price', 10, 2); // Precio
            $table->string('category'); // Categoría
            $table->string('brand'); // Marca
            $table->string('sku')->unique(); // SKU
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

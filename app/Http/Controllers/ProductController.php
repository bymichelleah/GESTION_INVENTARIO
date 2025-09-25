<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // =========================
    // API METHODS
    // =========================
    public function index()
    {
        // Si la petición es JSON → devolver API
        if (request()->wantsJson()) {
            return Product::all();
        }

        // Si es web → devolver vista
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'brand' => 'required|string',
            'sku' => 'required|string|unique:products',
        ]);

        $product = Product::create($validated);

        if ($request->wantsJson()) {
            return $product;
        }

        return redirect()->route('products.index')->with('success', 'Producto creado correctamente.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        if (request()->wantsJson()) {
            return $product;
        }

        return view('products.show', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'brand' => 'required|string',
            'sku' => 'required|string|unique:products,sku,' . $product->id,
        ]);

        $product->update($validated);

        if ($request->wantsJson()) {
            return $product;
        }

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        if (request()->wantsJson()) {
            return response()->json(['message' => 'Producto eliminado']);
        }

        return redirect()->route('products.index')->with('success', 'Producto eliminado correctamente.');
    }

    // =========================
    // EXTRA METHODS SOLO WEB
    // =========================
    public function create()
    {
        return view('products.create');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
}



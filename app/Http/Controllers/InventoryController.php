<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return Inventory::with('product')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'location' => 'nullable|string',
        ]);

        return Inventory::create($validated);
    }

    public function update(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        $validated = $request->validate([
            'quantity' => 'integer',
            'location' => 'string|nullable',
        ]);

        $inventory->update($validated);

        return $inventory;
    }

    public function destroy($id)
    {
        Inventory::destroy($id);
        return response()->json(['message' => 'Producto eliminado del inventario']);
    }
}

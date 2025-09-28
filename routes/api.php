<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;

Route::apiResource('products', ProductController::class);
Route::get('inventories', [InventoryController::class, 'index']);
Route::post('inventories', [InventoryController::class, 'store']);
Route::put('inventories/{id}', [InventoryController::class, 'update']);
Route::delete('inventories/{id}', [InventoryController::class, 'destroy']);

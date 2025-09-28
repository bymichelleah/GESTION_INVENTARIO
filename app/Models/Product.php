<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'category', 'brand', 'sku'
    ];

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }
}



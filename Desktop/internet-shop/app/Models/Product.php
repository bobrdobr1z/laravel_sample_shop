<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];
}

Product::create([
    'name' => 'Товар 1',
    'description' => 'Описание товара 1',
    'price' => 100.00,
    'image' => 'images/product1.jpg'
]);
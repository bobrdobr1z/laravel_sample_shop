<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Товар 1',
            'description' => 'Описание товара 1',
            'price' => 100.00,
            'image' => 'images/product1.jpg'
        ]);
        Product::create([
            'name' => 'Товар 2',
            'description' => 'Описание товара 2',
            'price' => 200.00,
            'image' => 'images/product2.jpg'
        ]);
        // добавьте еще товаров по необходимости
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request; // Импортируем класс Request

class ProductController extends Controller
{
    /**
     * Отображение списка товаров.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Отображение корзины.
     */
    public function cart()
    {
        $cart = session()->get('cart', []);
        return view('products.cart', compact('cart'));
    }

    /**
     * Добавление товара в корзину.
     */
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Товар добавлен в корзину!');
    }

    /**
     * Поиск товаров по запросу.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Поиск по названию или описанию
        $products = Product::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->paginate(10);

        return view('products.index', compact('products'));
    }
}
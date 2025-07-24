<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request; // Импортируем класс Request

class ProductController extends Controller
{
    /**
     * Отображение списка товаров с поиском, сортировкой и пагинацией.
     */
    public function index(Request $request)
    {
        // Получение параметров из запроса
        $searchQuery = $request->input('query');
        $sortOption = $request->input('sort');

        // Начинаем строить запрос к модели Product
        $productsQuery = Product::query();

        // Обработка поиска
        if ($searchQuery) {
            $productsQuery->where(function($query) use ($searchQuery) {
                $query->where('name', 'LIKE', "%{$searchQuery}%")
                      ->orWhere('description', 'LIKE', "%{$searchQuery}%");
            });
        }

        // Обработка сортировки
        switch ($sortOption) {
            case 'price_asc':
                $productsQuery->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $productsQuery->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $productsQuery->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $productsQuery->orderBy('name', 'desc');
                break;
            default:
                // Можно оставить без сортировки или по умолчанию
                break;
        }

        // Пагинация (например, 9 товаров на страницу)
        $products = $productsQuery->paginate(9);

        // Передача данных в представление
        return view('products.index', [
            'products' => $products,
            'query' => $searchQuery,
            'sort' => $sortOption,
        ]);
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
     * Удаление товара из корзины.
     */
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Товар удален из корзины!');
    }

    /**
     * Обновление количества товара в корзине.
     */
    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->input('quantities', []) as $id => $quantity) {
            if (isset($cart[$id])) {
                if ($quantity > 0) {
                    $cart[$id]['quantity'] = (int)$quantity;
                } else {
                    unset($cart[$id]);
                }
            }
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Корзина обновлена!');
    }

    /**
     * Отображение информации о конкретном товаре.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}
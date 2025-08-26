<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // подключение модели

class PaymentController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10); // или другой способ получения данных
        return view('payment.index', compact('products'));
    }
}
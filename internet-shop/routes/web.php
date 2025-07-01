<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // добавлено для использования Auth
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController; // добавлено
use App\Http\Controllers\DeliveryController; // добавлено

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::post('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout');
Route::get('/feedback', [FeedbackController::class, 'show'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'send'])->name('feedback.send');
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery');

Auth::routes(); // убедитесь, что пакет установлен и миграции выполнены

Route::get('/delivery-payment', function () {
    return view('pages.delivery_payment');
})->name('delivery.payment');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

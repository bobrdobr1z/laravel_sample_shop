<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController; 
use App\Http\Controllers\DeliveryController; 
use App\Http\Controllers\GalleryController;

Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::post('/upload', [PhotoController::class, 'upload'])->name('photo.upload');
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::post('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::post('/checkout', [OrderController::class, 'store'])->name('checkout');
Route::get('/feedback', [FeedbackController::class, 'show'])->name('feedback');
Route::post('/feedback', [FeedbackController::class, 'send'])->name('feedback.send');
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Route::get('/delivery', [DeliveryController::class, 'index'])->name('delivery');
Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
Auth::routes(); 
Route::get('/delivery-payment', function () {   return view('pages.delivery_payment');})->name('delivery.payment');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
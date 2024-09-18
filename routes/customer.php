<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LoginCustomerController;

// Customer Login Routes
Route::get('/login', [LoginCustomerController::class, 'showLoginForm'])->name('customer.login');
Route::post('/login', [LoginCustomerController::class, 'login'])->name('customer.signin');
Route::get('/register', [LoginCustomerController::class, 'showRegistrationForm'])->name('customer.register');
Route::post('/register', [LoginCustomerController::class, 'register'])->name('customer.register.submit');
Route::post('/logout', [LoginCustomerController::class, 'logout'])->name('customer.logout');

// Customer Product Detail
Route::get('/product/{id}', [DetailController::class, 'show'])->name('product.show');
Route::get('/', [BerandaController::class, 'index'])->name("beranda");

Route::get('/history', [CheckoutController::class, 'history'])->name('history');

// Customer Cart - Proteksi dengan Middleware Auth
Route::middleware('customer')->group(function () {
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::get('/cart/update/{id}/{quantity}', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('index.checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('store.checkout');
    Route::get('/confirm/{code}', [CheckoutController::class, 'confirm'])->name('confirm');
});

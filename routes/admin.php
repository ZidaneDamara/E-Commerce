<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\SupplyChainController;

Route::prefix('dashboard')->name('admin.')->group(function () {
    // Login Process
    Route::get('/login', [LoginAdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginAdminController::class, 'login'])->name('auth');

    Route::middleware('admin')->group(function () {
        Route::post('/logout', [LoginAdminController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('produk', ProductController::class);
        Route::get('/order', [CheckoutController::class, 'admin_checkout'])->name('checkout');
        Route::post('/order', [CheckoutController::class, 'update_status_order'])->name('update_status_order');
        Route::resource('supply-chain', SupplyChainController::class);
        Route::resource('supplier', SupplierController::class);
        Route::resource('purchase', PurchaseController::class); 
    });
});
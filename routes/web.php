<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;

Route::get('/', [MenuController::class, 'index'])->name('menu.index');

Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');

Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::post('/order', [CartController::class, 'order'])->name('order.store');
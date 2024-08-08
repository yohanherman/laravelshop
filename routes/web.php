<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\ProductdetailedController;
use Illuminate\Support\Facades\Route;


// Route::prefix('/v1')->group(function(){


Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.showCart');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::delete('/delete-product/{id}', [CartController::class, 'deleteFromCart'])->name('cart.remove');
    Route::put('/cart/increase-product/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
    Route::put('/cart/decrease-product/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');
});


Route::get('/', [HomeControllers::class, 'getHomeData']);
route::get('/productDetailedpage/{id}', [ProductdetailedController::class, 'getAProduct']);

// routes for users
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('post.login');
Route::get('/register', [AuthController::class, 'register'])->name('get.register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('post.register');



// });
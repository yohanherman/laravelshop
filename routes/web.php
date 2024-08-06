<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\ProductdetailedController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


// Route::prefix('/v1')->group(function(){

Route::get('/home', [HomeControllers::class, 'getHomeData']);
route::get('/productDetailedpage/{id}', [ProductdetailedController::class, 'getAProduct']);
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.showCart');
Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::delete('/delete-product/{id}', [CartController::class, 'deleteFromCart'])->name('cart.remove');
Route::put('/cart/increase-product/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::put('/cart/decrease-product/{id}' , [CartController::class , 'decreaseQuantity'])->name('cart.decrease');

// });
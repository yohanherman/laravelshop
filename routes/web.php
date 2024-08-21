<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminCartController;
use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\ProductdetailedController;
use App\Http\Middleware\adminAuth;
use Illuminate\Support\Facades\Route;


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
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// routes for admin
Route::prefix('/admin')->namespace('App\Http\Controllers\admin')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('getLogin');
    // Route::match(['get','post'], '/register', [AdminController::class, 'register'])->name('register');
    Route::get('/register', [AdminController::class, 'register'])->name('getRegister');
    Route::post('/register', [AdminController::class, 'adminRegisterPost'])->name('registerPost');
    Route::post('/login', [AdminController::class, 'adminLoginPost'])->name('loginPost');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboardAdmin');
        Route::get('/products', [productController::class, 'allProducts'])->name('get.products');
        Route::get('/cart', [AdminCartController::class, 'index'])->name('get.cart');
        Route::get('/product/{id}', [productController::class, 'showProduct'])->name('show.product');
        Route::get('/addProduct',[productController::class ,'creationProductForm'])->name('form.create');
        Route::post('/addProduct',[productController::class, 'createProduct'])->name('post.createProduct');
    });
});

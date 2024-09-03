<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminCartController;
use App\Http\Controllers\ajaxController;
use App\Http\Controllers\forgotPasswordController;
use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\orderController;
use App\Http\Controllers\ProductdetailedController;
use App\Http\Controllers\searchController;
use App\Http\Middleware\adminAuth;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.showCart');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::delete('/delete-product/{id}', [CartController::class, 'deleteFromCart'])->name('cart.remove');
    Route::put('/cart/increase-product/{id}', [CartController::class, 'increaseQuantity'])->name('cart.increase');
    Route::put('/cart/decrease-product/{id}', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');
    Route::post('/order', [orderController::class, 'addOrder'])->name('post.order');
    Route::get('/order/resume', [orderController::class, 'showOrder'])->name('order.get');
});


Route::get('/', [HomeControllers::class, 'getHomeData'])->name('home.products');
Route::get('/productbycategory/{id}', [HomeControllers::class,  'productByCategory'])->name('product.category');
Route::get('/productDetailedpage/{id}', [ProductdetailedController::class, 'getAProduct']);

// AJAX ROUTE
Route::get('/get-product-image/{id}', [ajaxController::class, 'getProductImage']);

// SEARCH ROUTE
Route::get('/search', [searchController::class, 'seachProduct'])->name('search');


// routes for users
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('post.login');
Route::get('/register', [AuthController::class, 'register'])->name('get.register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('post.register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forget-password.get');
Route::post('/forgot-password', [AuthController::class, 'forgotPasswordPost'])->name('forgot-password.post');
Route::get('/reset/{token}', [AuthController::class, 'reset'])->name('reset');
Route::post('/reset/{token}', [AuthController::class, 'resetPost'])->name('reset.post');

// routes for admin
Route::prefix('/admin')->namespace('App\Http\Controllers\admin')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('getLogin');
    // Route::match(['get','post'], '/register', [AdminController::class, 'register'])->name('register');
    Route::get('/register', [AdminController::class, 'register'])->name('getRegister');
    Route::post('/register', [AdminController::class, 'adminRegisterPost'])->name('registerPost');
    Route::post('/login', [AdminController::class, 'adminLoginPost'])->name('loginPost');

    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboardAdmin');
        Route::get('/cart', [AdminCartController::class, 'index'])->name('get.cart');

        // PRODUCT ROUTES
        Route::get('/products', [productController::class, 'allProducts'])->name('get.products');
        Route::get('/product/{id}', [productController::class, 'showProduct'])->name('show.product');
        Route::get('/addProduct', [productController::class, 'creationProductForm'])->name('form.create');
        Route::get('/updateProduct/{id}', [productController::class, 'updateForm'])->name('get.updateProduct');
        Route::post('/addProduct', [productController::class, 'createProduct'])->name('post.createProduct');
        Route::delete('/product/{id}', [productController::class, 'deleteProduct'])->name('delete.product');
        Route::put('/updateproduct/{id}', [productController::class, 'updateProduct'])->name('post.updateProduct');
        Route::get('/confirmation-deletion/{id}', [productController::class, 'confirmDeletion'])->name('confirm.deletion');

        // PRODUCT BY CATEGORY
        // Route::get('/productbycategory/{id}', [productController::class,  'productByCategory'])->name('product.category');
    });
});

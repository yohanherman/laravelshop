<?php

use App\Http\Controllers\categoriesControllers;
use App\Http\Controllers\productsControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Route::prefix('/v1')->group(function () {

    // routes for products
//     Route::get('/products', [productsControllers::class, 'getProducts']);
//     Route::get('/product/{id}', [productsControllers::class, 'getAProduct']);
//     Route::post('/product/create', [productsControllers::class, 'storeProducts']);
//     Route::delete('/product/{id}', [productsControllers::class, 'deleteProduct']);
//     Route::put('/product/{id}', [productsControllers::class, 'updateProduct']);


//     // routes for catgeories
//     Route::get('/categories', [categoriesControllers::class, 'getCategories']);
//     Route::get('/category/{id}' , [categoriesControllers::class , 'getAcategory']);
// });

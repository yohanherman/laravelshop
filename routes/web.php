<?php

use App\Http\Controllers\HomeControllers;
use App\Http\Controllers\productsControllers;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeControllers::class, 'getHomeData']);
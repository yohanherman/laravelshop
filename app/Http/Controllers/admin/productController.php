<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\products;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function allProducts()
    {
        $products = products::paginate(2);
        // dd($products);
        return view('admin.products', ['products' => $products]);
    }
}

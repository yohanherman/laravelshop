<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function allProducts()
    {
        $products = products::paginate(2);
        // dd($products);
        return view('admin.products', ['products' => $products]);
    }

    public function showProduct(int $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        // dd($product);
        return view('admin.showproduct', ['product' => $product]);
    }

    public function creationProductForm()
    {
        return view('admin.creationform');
    }

    public function createProduct(Request $request)
    {

        $rules = [
            'productname' => 'required|string',
            'description' => 'required|string',
            'productprice' => 'required|numeric',
            // 'product_discount' => 'numeric',
            'origin' =>'string',
            'categories_id' => 'required',
            'status'=>'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $datas = products::create($request->all());
        return redirect()->route('get.products')->with('success', 'product successfully created');
    }
}

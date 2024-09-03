<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\option;
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
         
        $images = DB::table('images')
            ->join('products', 'products.id', '=', 'images.product_id')
            ->select('images.imageCover')
            ->where('product_id', $id)
            ->get();
        // dd($images);

        $context = [
            'product' => $product,
            'images'=>$images
        ];
        return view('admin.showproduct', $context);
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
            'product_discount' => 'nullable|numeric',
            'origin' => 'nullable|string',
            'categories_id' => 'required',
            'status' => 'required|boolean',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // $datas = products::create($request->all());
        $coverName = time() . '.' . $request->cover->extension();
        $request->cover->move(public_path('images'), $coverName);
        $products = new products();
        $products->productname = $request->productname;
        $products->description = $request->description;
        $products->productprice = $request->productprice;
        $products->origin = $request->origin;
        $products->categories_id = $request->categories_id;
        $products->product_discount = $request->product_discount;
        $products->status = $request->status;
        $products->cover = 'images/' . $coverName;
        $products->save();
        return redirect()->route('get.products')->with('success', 'product successfully created');
    }

    public function deleteProduct(int $id)
    {
        $data = products::findOrFail($id);
        $data->delete();
        return redirect()->route('get.products')->with('success', 'product successfully deleted');
    }

    public function confirmDeletion($id)
    {
        $product = products::findOrFail($id);
        return view('admin.deletionConfirmation', ['product' => $product]);
    }

    public function updateForm(int $id)
    {
        $data = products::findOrFail($id);
        return view('admin.updateProduct', ['data' => $data]);
    }


    public function updateProduct(int $id, Request $request)
    {
        $rules = [
            'productname' => 'required|string',
            'description' => 'required|string',
            'productprice' => 'required|numeric',
            'product_discount' => 'nullable|numeric',
            'origin' => 'nullable|string',
            'categories_id' => 'required',
            'status' => 'required|boolean',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = products::findOrFail($id);
        if ($request->hasFile('cover')) {
            if ($data->cover && file_exists(public_path($data->cover))) {
                unlink(public_path($data->cover));
            }
            $coverName = time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('images'), $coverName);
            $data->cover = 'images/' . $coverName;
        }
        $data->productname = $request->productname;
        $data->description = $request->description;
        $data->productprice = $request->productprice;
        $data->product_discount = $request->product_discount;
        $data->origin = $request->origin;
        $data->categories_id = $request->categories_id;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('get.products')->with('success', 'product updated successfully');
    }
}

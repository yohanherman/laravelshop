<?php

namespace App\Http\Controllers;

use App\Models\images;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductdetailedController extends Controller
{
    public function getAProduct(int $product_id)
    {
        $data = products::findOrFail($product_id);
        $countImages = images::where('product_id', $product_id)->count();
        $images = images::where('product_id', $product_id)->get();
        // dd($images);
        $context = [
            'data' => $data,
            'images' => $images,
            'countImages' => $countImages
        ];
        return view('pages.detailedpage', $context);
    }

}

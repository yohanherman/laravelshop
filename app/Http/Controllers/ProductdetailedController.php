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



    // // public function getProductImage(int $id)
    // // {
    // //     $option = DB::table('options')
    // //         ->join('colors', 'colors.id', '=', 'options.colors_id')
    // //         ->where('colors_id', $id)
    // //         ->select('options.images', 'colors.colors')
    // //         ->first();

    // //     // dd($option);

    // //     if ($option) {
    // //         $imageUrl = asset('images/' . $option->images);
    // //         return response()->json([
    // //             'images' => $imageUrl,
    // //             'colors' => $option->colors
    // //         ]);
    // //     }
    // //     return response()->json(['error' => 'Image not found'], 404);
    // // }
}

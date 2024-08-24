<?php

namespace App\Http\Controllers;

use App\Models\option;
use App\Models\products;
use App\Models\taille;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductdetailedController extends Controller
{
    public function getAProduct(int $id)
    {
        $options = DB::table('options')
            ->join('products', 'products.id', '=', 'options.product_id')
            ->join('colors', 'colors.id', '=', 'options.colors_id')
            ->select('products.*', 'colors.*')
            ->where('options.product_id', '=', $id)
            ->get();

        // dd($options);

        $data = products::findOrFail($id);
        $tailles = taille::all();
        $context = [
            'data' => $data,
            'tailles' => $tailles,
            'options' => $options
        ];
        return view('pages.detailedpage', $context);
    }


    // public function getProductImage(int $id)
    // {
    //     $option = DB::table('options')
    //         ->join('colors', 'colors.id', '=', 'options.colors_id')
    //         ->where('colors_id', $id)
    //         ->select('options.images', 'colors.colors')
    //         ->first();

    //     // dd($option);

    //     if ($option) {
    //         $imageUrl = asset('images/' . $option->images);
    //         return response()->json([
    //             'images' => $imageUrl,
    //             'colors' => $option->colors
    //         ]);
    //     }
    //     return response()->json(['error' => 'Image not found'], 404);
    // }
}

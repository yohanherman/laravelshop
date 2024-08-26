<?php

namespace App\Http\Controllers;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductdetailedController extends Controller
{
    public function getAProduct(int $product_id)
    {
    //         $options = DB::table('product_options')
    //             ->join('products', 'products.id', '=', 'product_options.product_id')
    //             ->join('options', 'options.id', '=', 'product_options.option_id')
    //             ->select('products.*', 'options.*', 'product_options.*')
    //             ->where('product_id', '=', $id)
    //             ->get();
    //         // dd($options);


            $data = products::findOrFail($product_id);


            // $option = testoption::findOrFail($product_id);

            // $optionvalue = 

            // $sizes = size::all();
            // dd($size);


            // Préparer les données pour la vue
            $context = [
                'data' => $data,
                // 'sizes' => $sizes,
                // 'options'=> $options

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


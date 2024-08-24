<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ajaxController extends Controller
{
    public function getProductImage(int $id)
    {
        $option = DB::table('options')
            ->join('colors', 'colors.id', '=', 'options.colors_id')
            ->where('colors_id', $id)
            ->select('options.images', 'colors.colors')
            ->first();

        // dd($option);

        if ($option) {
            $imageUrl = asset('images/' . $option->images);
            return response()->json([
                'images' => $imageUrl,
                'colors' => $option->colors
            ]);
        }
        return response()->json(['error' => 'Image not found'], 404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ajaxController extends Controller
{
    public function getProductImage(int $id)
    {
        $image = images::findOrFail($id);
        // dd($image);
        if ($image) {
            $imageUrl = asset('images/' . $image->imageCover);
            return response()->json([
                'image' => $imageUrl
            ]);
        }
        return response()->json(['error' => 'Image not found'], 404);
    }
}

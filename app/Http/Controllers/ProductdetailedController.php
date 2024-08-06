<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\taille;
use Illuminate\Http\Request;

class ProductdetailedController extends Controller
{
    public function getAProduct(int $id)
    {
        $data = products::find($id);
        $tailles = taille::all();
        $context = [
            'data' => $data,
            'tailles' => $tailles
        ];
        return view('pages.detailedpage', $context);
    }
}

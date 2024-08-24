<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function seachProduct(Request $request)
    {
        $query = $request->input('product_name');
        $datas = products::where('productname', 'LIKE', "%{$query}%")
            // ->orWhere('description', 'LIKE', "%{$query}%");
            ->get();
        return view('pages.searchResult', compact('datas'));
    }
}

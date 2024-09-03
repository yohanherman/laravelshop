<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeControllers extends Controller
{
    public function getHomeData()
    {
        $categories = categories::all();
        $randomProducts = DB::table('products')->inRandomOrder()->take(6)->get();

        $context = [
            'categories' => $categories,
            'randomProducts' => $randomProducts
        ];
        return view('pages.home', $context);
    }

    public function productByCategory($category_id)
    {
        $datas = products::where('categories_id', $category_id)->get();
        // dd($data);
        return view('pages.productbycat', ['datas' => $datas]);
    }
}

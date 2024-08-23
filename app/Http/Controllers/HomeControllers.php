<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeControllers extends Controller
{
    public function getHomeData()
    {
        $categories = categories::all();
        $randomProducts = DB::table('products')->inRandomOrder()->take(5)->get();

        $context = [
            'categories' => $categories,
            'randomProducts' => $randomProducts
        ];

        return view('pages.home', $context);
    }


    // public function getProducts()
    // {
    //     $randomProducts = DB::table('products')->inRandomOrder()->take(2)->get();

    //     return view('pages.home' ,['randomProducts' => $randomProducts]);
    // }
}

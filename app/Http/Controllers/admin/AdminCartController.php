<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCartController extends Controller
{
    public function index()
    {
        // $cart = cart::paginate(2);
        $datas = DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->join('tailles', 'tailles.id', '=', 'carts.taille_id')
            ->join('users', 'users.id', "=", 'carts.user_id')
            ->select('products.*', 'carts.*', 'tailles.*', 'users.name')
            ->paginate(1);
        // dd($datas);
        return view('admin.cart', ['datas' => $datas]);
    }
}

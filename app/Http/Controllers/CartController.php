<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function showCart()
    {
        $user_id = auth()->id();
        if (!$user_id) {
            return redirect()->route('login')->with('error', 'you must be connected');
        }
        $datas = DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->join('tailles', 'tailles.id', '=', 'carts.taille_id')
            ->join('colors', 'colors.id', '=', 'carts.colors_id')
            // ->join()
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->select('products.*', 'carts.*', 'tailles.*', 'colors.*', 'users.name')
            ->where('carts.user_id', "=", $user_id)
            ->get();
        // dd($data);

        $total = DB::table('carts')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->where('carts.user_id', '=', $user_id)
            ->selectRaw('SUM(carts.quantity * products.productprice) AS total')
            ->first();

        $context = [
            'datas' => $datas,
            'total' => $total->total
        ];
        return view('pages.cart', $context);
    }

    public function addToCart(Request $request)
    {
        // dd($request->product_id);
        $rules = [
            'product_id' => 'required',
            'taille_id' => 'required',
            'user_id' => 'required',
            'colors_id' => 'required',
            'quantity' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return;
        }
        $cartItem = cart::where('product_id', $request->product_id)->first();
        if ($cartItem) {
            // dd('je rentre ici');
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
            return redirect()->route('cart.showCart');
        } else {
            // dd("jai rien trouvé donc je rentre ici");
            $cart = cart::create($request->all());
            return redirect()->route('cart.showCart')->with('success', 'successfully added to cart');
        }
    }

    public function deleteFromCart(int $id)
    {
        // dd('deleted now');
        $cartItem = Cart::where('product_id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'successfully removed from cart');
        };
    }

    public function increaseQuantity(int $id)
    {
        $cartItem = cart::where('product_id', $id)->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        }
        return redirect()->route('cart.showCart');
    }

    public function decreaseQuantity(int $id)
    {
        $cartItem = cart::where('product_id', $id)->first();
        if ($cartItem) {
            $cartItem->quantity -= 1;
            $cartItem->save();
        }
        if ($cartItem->quantity === 0) {
            $cartItem->delete();
        }
        return redirect()->route('cart.showCart');
    }
}

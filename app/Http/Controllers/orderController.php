<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\order_details;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{

    public function showOrder()
    {
        return view('pages.order');
    }

    public function addOrder(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'total_amount' => 'required',
            'shipping_adress' => 'nullable',
            'products' => 'required|array',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('cart')->withErrors($validator)->withInput();
        }

        // je cree la commande
        $order = Order::create([
            'user_id' => $request->user_id,
            'total_amount' => $request->total_amount,
            'order_date' => now()
        ]);

        // j'ajoute les details de la commande
        foreach ($request->products as $product) {
            OrderDetails::create([
                'order_id' => $order->id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'productprice' => $product['productprice'],
            ]);
        }
        return redirect()->route('order.get')->with('success', 'order passed');
    }
}

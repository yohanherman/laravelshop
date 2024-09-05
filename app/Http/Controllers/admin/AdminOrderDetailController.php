<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\order_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminOrderDetailController extends Controller
{

    public function show($order_id)
    {
        $order_details = DB::table('order_details')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            // ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->select('order_details.*', 'products.*')
            ->where('order_id', $order_id)
            ->get();
        return view('admin.orderdetails', ['order_details' => $order_details]);
    }
}

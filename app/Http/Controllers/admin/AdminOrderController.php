<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('status', 'status.id', '=', 'orders.status_id')
            ->select('orders.*', 'users.name')
            ->get();
        // dd($orders);
        return view('admin.order', ['orders' => $orders]);
    }

    public function editOrderStatus(int $id)
    {
        $orders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('status', 'status.id', '=', 'orders.status_id')
            ->select('orders.*', 'users.name')
            ->where('orders.id', $id)
            ->first();
        // dd($orders);
        return view('admin.editOrder', ['orders' => $orders]);
    }


    public function editStatus(Request $request, int $id)
    {
        $rules = [
            'status_id' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $datas = Order::findOrFail($id);
        $datas->status_id = $request->status_id;
        $datas->save();
        return redirect()->route('get.orders')->with('success', 'status updated');
    }
}

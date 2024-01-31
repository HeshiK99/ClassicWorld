<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\User;

class OrderController extends Controller
{
    public function index()
    {
        if(auth()->user()->type == 'admin')
        {
            $orders = Orders::where('paid', 1)->get();
        }
        else
        {
            $orders = Orders::where('paid', 1)->where('users_id', auth()->user()->id)->get();
        }

        return view('Backend.orders', compact('orders'));
    }

    public function getOrderDetails(Request $request)
    {
        $order_details['order'] = Orders::where('id', $request->invoice_id)->first();
        $order_details['user'] = User::where('id', $order_details['order']['users_id'])->first();
        $order_details['order_items'] = OrderItems::where('order_id', $order_details['order']['id'])->get();

        return $order_details;
    }
}

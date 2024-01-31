<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderItems;
use App\Models\CartItems;
use HeaderHelper;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('Frontend.checkout');
    }

    public function orderCheckout(Request $request, $order_note)
    {
        if(isset(auth()->user()->id))
        {
            $order_total = HeaderHelper::getCartTotal();

            $order['total'] = $order_total;
            $order['date'] = date('Y-m-d');
            $order['users_id'] = auth()->user()->id;

            $result = Orders::create($order);

            $cart_items = CartItems::where('users_id', auth()->user()->id)->get();

            foreach($cart_items as $item)
            {
                $order_item['name'] = $item['name'];
                $order_item['quantity'] = $item['quantity'];
                $order_item['price'] = $item['total'];
                $order_item['individual_price'] = $item['price'];
                $order_item['product_id'] = $item['product_id'];
                $order_item['order_id'] = $result->id;

                OrderItems::create($order_item);
            }

            $order_id = $result->id;
            $order_amount = $order_total;

            return view('stripe', compact('order_id', 'order_amount'));
        }
    }
}
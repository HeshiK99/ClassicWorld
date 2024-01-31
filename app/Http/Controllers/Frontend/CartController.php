<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItems;

class CartController extends Controller
{

    public function index()
    {
        $cart_items = CartItems::where('users_id', auth()->user()->id)->get();
        return view('Frontend.cart', compact('cart_items'));
    }

    public function addToCart(Request $request)
    {
        $existing_product = CartItems::where('users_id', auth()->user()->id)->where('product_id', $request->product_id)->first();
        $product_details = Product::where('id', $request->product_id)->first();

        if($existing_product != null)
        {
            $new_quantity = $existing_product['quantity'] + $request->quantity;
            $result = CartItems::where('users_id', auth()->user()->id)->where('product_id', $request->product_id)->update([
                'quantity' => $new_quantity,
                'price' => $product_details->price,
                'total' => $product_details->price * $new_quantity,
                'date' => date('Y-m-d')
            ]);
        }
        else
        {
            $cart_item['image'] = $product_details->image;
            $cart_item['name'] = $product_details->name;
            $cart_item['quantity'] = $request->quantity;
            $cart_item['price'] = $product_details->price;
            $cart_item['total'] = $product_details->price * $request->quantity;
            $cart_item['date'] = date('Y-m-d');
            $cart_item['users_id'] = auth()->user()->id;
            $cart_item['product_id'] = $request->product_id;

            $result = CartItems::create($cart_item);
        }

        if($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function removeCart(Request $request)
    {
        $deletedRows = CartItems::where('users_id', auth()->user()->id)
            ->where('product_id', intval($request->product_id))
            ->delete();

        if ($deletedRows > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
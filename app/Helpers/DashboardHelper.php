<?php

namespace App\Helpers;

use App\Models\Categories;
use App\Models\CartItems;
use App\Models\Orders;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardHelper
{
    public static function getTotalOrderRevenue($user_id = null, $user_type = null)
    {
        if($user_type == 'admin')
        {
            $total_revenue = Orders::where('paid', 1)->sum('total');
        }
        else
        {
            $total_revenue = Orders::where('paid', 1)->where('users_id', $user_id)->sum('total');
        }
        return $total_revenue;
    }

    public static function getTotalOrders()
    {
        $total_orders = Orders::where('paid', 1)->count('id');
        return $total_orders;
    }

    public static function getTotalPayments($user_id = null)
    {
        $total_payments = Orders::where('paid', 1)->where('users_id', $user_id)->sum('total');
        return $total_payments;
    }

    public static function getLatestOrders($user_id = null, $user_type = null, $limit = null)
    {
        if($user_type == 'admin')
        {
            $latest_orders = Orders::where('paid', 1)->limit($limit)->get();
        }
        else
        {
            $latest_orders = Orders::where('paid', 1)->where('users_id', $user_id)->limit($limit)->get();
        }

        foreach($latest_orders as $order)
        {
            $user_details = User::where('id', $order['users_id'])->first();
            $order['user_image'] = $user_details->image;
            $order['user_name'] = $user_details->name;
        }

        return $latest_orders;
    }

    public static function getBestSellingItems()
    {
        $bestSellingItems = DB::table('order_item')
            ->select('product_id', DB::raw('SUM(quantity) as total_quantity_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity_sold')
            ->limit(7)
            ->get();

        foreach ($bestSellingItems as $item) 
        {
            $item_details = Product::where('id', $item->product_id)->first();
            $item->product_name = $item_details->name;
            $item->product_image = $item_details->image;
            $item->product_price = $item_details->price;
            $item->product_quantity = $item_details->quantity;
        }

        return $bestSellingItems;
    }
}
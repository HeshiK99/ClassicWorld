<?php

namespace App\Helpers;

use App\Models\Categories;
use App\Models\CartItems;

class HeaderHelper
{
    public static function getCategories()
    {
        $categories = Categories::where('active', 1)->where('deleted', 0)->get();
        return $categories;
    }

    public static function getCartItems()
    {
        if(auth()->user() != null)
        {
            return CartItems::where('users_id', auth()->user()->id)->get();
        }
        else
        {
            return [];
        }
    }

    public static function getCartItemCount()
    {
        if(auth()->user() != null)
        {
            return CartItems::where('users_id', auth()->user()->id)->count();
        }
        else
        {
            return 0;
        }
    }

    public static function getCartTotal()
    {
        if(auth()->user() != null)
        {
            return CartItems::where('users_id', auth()->user()->id)->sum('total');
        }
        else
        {
            return 0;
        }
    }
}
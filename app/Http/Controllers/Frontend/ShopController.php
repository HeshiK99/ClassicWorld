<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::where('active', 1)->where('deleted', 0)->paginate(10);

        return view('Frontend.shop', compact('products'));
    }

    public function filterByPrice($min_value, $max_value)
    {
        $products = Product::where('active', 1)->where('deleted', 0)->where('price', '>=', $min_value)->where('price', '<=', $max_value)->paginate(10);

        return view('Frontend.shop', compact('products'));
    }

    public function filterByCriteria($criteria)
    {
        if($criteria == "default")
        {
            $products = Product::where('active', 1)->where('deleted', 0)->paginate(10);
        }
        else if($criteria == "popularity")
        {

        }
        else if($criteria == "rating")
        {

        }
        else if($criteria == "newness")
        {
            $products = Product::where('active', 1)->where('deleted', 0)->orderBy('created_at', 'DESC')->paginate(10);
        }
        else if($criteria == "lowtohigh")
        {
            $products = Product::where('active', 1)->where('deleted', 0)->orderBy('price', 'ASC')->paginate(10);
        }
        else if($criteria == "hightolow")
        {
            $products = Product::where('active', 1)->where('deleted', 0)->orderBy('price', 'DESC')->paginate(10);
        }

        return view('Frontend.shop', compact('products'));
    }

    public function filterByCategory($category_id)
    {
        $products = Product::where('active', 1)->where('deleted', 0)->where('category_id', $category_id)->paginate(10);

        return view('Frontend.shop', compact('products'));
    }

    public function searchProducts(Request $request)
    {
        $products = Product::where('active', 1)->where('deleted', 0)->where('name', 'like', '%' . $request->search . '%')->paginate(100);

        return view('Frontend.shop', compact('products'));
    }
}
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Reviews;

class ProductController extends Controller
{
    public function index($product_id)
    {
        $product_details = Product::where('id', $product_id)->first();

        $reviews = Reviews::where('product_id', $product_id)->get();

        return view('Frontend.single-product', compact('product_details', 'reviews'));
    }

    public function postReview(Request $request)
    {
        $review['review'] = $request->review;
        $review['user_id'] = auth()->user()->id;
        $review['product_id'] = $request->product_id;

        $result = Reviews::create($review);

        if($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stocks;
use App\Models\StockItems;

class StockController extends Controller
{
    public function index()
    {
        $product = Product::where('deleted',0)->get();

        return view('Backend.stock',compact('product'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stock_name'=> 'required|string|max:255',
            'stock_date'=> 'required',
            'dataArray'=> 'required',
        ]);

        $stock['name'] = $request->stock_name;
        $stock['recieved_date'] = $request->stock_date;
        
        $result = Stocks::create($stock);

        foreach($request->dataArray as $single_item)
        {
            $stock_item['quantity'] = $single_item['quantity'];
            $stock_item['product_id'] = $single_item['product'];
            $stock_item['stock_id'] = $result->id;

            $result2 = StockItems::create($stock_item);

            $product_details = Product::where('id', $single_item['product'])->first();

            Product::where('id', $single_item['product'])->update([
                'quantity' => $product_details['quantity'] + $single_item['quantity']
            ]);
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
}

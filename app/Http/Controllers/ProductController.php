<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::where('deleted',0)->get();
        $categories = Categories::where('deleted', 0)->get();
        return view('Backend.products',compact('product','categories'));
        
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|string|max:255',
            'category_id'=> 'required|int',
            'price'=>'required|int',
            'quantity'=>'required|int',
            'fileInput' => 'required',
        ]);

        $imageData = $request->fileInput;
        $data = substr($imageData, strpos($imageData, ',') + 1);
        $data = base64_decode($data);
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];
        Storage::disk('public')->put("/products/" . $fileName , $data);

        $product['name'] = $request->name;
        $product['category_id'] = $request->category_id;
        $product['price'] = $request->price;
        $product['quantity'] = $request->quantity;
        $product['image'] = $fileName;

        $result = Product::create($product);

        if ($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function update(Request $request)
    {
        foreach($request->changedArray as $single_product)
        {
            $result = Product::where('id', $single_product['productid'])->update([
                'category_id' => $single_product['categoryid'],
                'name' => $single_product['productname'],
                'price' => $single_product['productprice'],
                'active' => $single_product['activestatus']
            ]);
        }

        if ($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function delete(Request $request)
    {
        $result = Product::where('id', $request->category_id)->update([
            'deleted' => 1
        ]);

        if ($result)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}

       

      
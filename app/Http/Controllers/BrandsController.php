<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use LDAP\Result;

class BrandsController extends Controller
 {
    public function index()
    {
        $brands=Brands::where('deleted',0)->get();
        return view('Backend.brands',compact('brands'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|string|max:255'
        ]);

        $brand['name'] = $request->name;
        $result = Brands::create($brand);

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
        foreach($request->changedArray as $single_brand)
        {
            $result = Brands::where('id', $single_brand['brandid'])->update([
                'name' => $single_brand['brandname'],
                'active' => $single_brand['activestatus'],
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
        $result = Brands::where('id', $request->brand_id)->update([
            'deleted' => 1
        ]);

        Categories::where('brand_id', $request->brand_id)->update([
            'deleted' => 1
        ]);

        $brand_categories = Categories::where('brand_id', $request->brand_id)->get();

        foreach($brand_categories as $brand_category)
        {
            Product::where('category_id', $brand_category->id)->update([
                'deleted' => 1
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
}


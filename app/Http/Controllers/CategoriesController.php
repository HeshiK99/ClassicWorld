<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::where('deleted', 0)->get();
        $brands = Brands::where('deleted',0)->get();
    
        return view('Backend.categories', compact('categories','brands'));
    }
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name'=> 'required|string|max:255',
        //     'brand_id'=> 'required|int'
        // ]);

        $categories['name'] = $request->categoryname;
        $categories['brand_id'] = $request->brand_id;
        $result = Categories::create($categories);

        if ($result)
        {
            Session::flash('success', 'Category added successful');
        
            // return view('Backend.categories', compact('categories','brands'));
            return redirect()->back();
        }
        else
        {
            Session::flash('error', 'Something went wrong');
        
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        foreach($request->changedArray as $single_category)
        {
            $result = Categories::where('id', $single_category['categoryid'])->update([
                'name' => $single_category['categoryname'],
                'active' => $single_category['activestatus'],
                'brand_id' => $single_category['brandid'],
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
        $result = Categories::where('id', $request->category_id)->update([
            'deleted' => 1
        ]);

        Product::where('category_id', $request->category_id)->update([
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
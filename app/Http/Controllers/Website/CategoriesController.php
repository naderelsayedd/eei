<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Product_categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getAllCategories()
    {

        // $categories = Product_categories::whereNotNull(columns: 'name')->get();
        $categories = Product_categories::all();
        // return response()->json($categories);
        return view('website.eei.partial.header', compact('categories'));
    }

    public function show()
    {
        // $products = Product::with('product_category')->where('product_category_id' , $id)->get();
        // return response()->json($products);
        // return view('website.eei.pages.home')->with('products', $products);
        $categoryProducts = Product_categories::with('products')->get();
        // return response()->json($categoryProducts);

        return view('website.eei.pages.home', compact('categoryProducts'));
    }

    public function details($id){
        $categoryProducts = Product::where('product_category_id' ,$id)->get();
        // return response()->json($categoryProducts);
        return view('website.eei.pages.service-card-details')->with('categoryProducts', $categoryProducts);
    }
}

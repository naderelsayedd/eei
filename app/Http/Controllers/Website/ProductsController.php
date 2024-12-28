<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function product($product_id)
    {
        $product = Product::Active()->findOrFail($product_id);
        $related_fishes = [];

        return view('website.'.config('dashboard.theme_name').'.pages.subpages.product')->with([
            'product' => $product,
            'related_fishes' => $related_fishes
        ]);
    }
}

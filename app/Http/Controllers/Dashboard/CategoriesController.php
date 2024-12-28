<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product_categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $allCategories = Product_categories::all();
        // return response()->json($allCategories);
        // dd($allCategories);
        return view('dashboard.categories.list', compact('allCategories'));
    }
}

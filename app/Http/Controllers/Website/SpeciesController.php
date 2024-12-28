<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Crops;
use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\Fish_type;
use App\Models\Page;
use App\Models\Product;
use App\Models\Product_categories;
use App\Models\Section;

class SpeciesController extends Controller
{
    public function species($species_id)
    {
        $page = Page::Active()->MainPages()->where('link', 'species')->first();
        $sections = Section::Active()->where('page_id', $page->id)->orderBy('order')->get();
        $species = Product_categories::Active()->findOrFail($species_id);
        $crops = Crops::Active()->where('product_category_id', $species->id)->get();

        return view('website.'.config('dashboard.theme_name').'.pages.species')->with([
            'page' => $page,
            'sections' => $sections,
            'fishes' => $crops
        ]);
    }
    public function productcatindex($cat_id)
    {
        dd('sdsdsd');
        $cat = Product_categories::Active()->findOrFail($cat_id);
        $cproducts = Product::Active()->where('product_category_id', $cat->id)->get();

        return view('website.'.config('dashboard.theme_name').'.pages.productcategory')->with([
            'cat' => $cat,
            'cproducts' => $cproducts
        ]);
    }

    public function crop($crop_id)
    {
        $crop = Crops::Active()->findOrFail($crop_id);


        return view('website.'.config('dashboard.theme_name').'.pages.subpages.crop')->with([
            'crop' => $crop
        ]);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Contact;
use App\Models\Crops;
use App\Models\Product_categories;
use App\Models\Page;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Support\Facades\App;
use App\Models\Service;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('website.eei.partial.header', callback: function ($view) {
            // $categories = Product_categories::whereNotNull(columns: 'name')->get();
            $categories = Product_categories::all();
            // dd($categories->name);
            $view->with('categories', $categories);
        });

        if (!App::runningInConsole()) {
            if (!session()->has('locale')) {
                session()->put('locale', 'ar');
            }
            app()->setLocale(session()->get('locale'));
            if (Schema::hasTable('settings')) {
                foreach (Setting::all() as $setting) {
                    Config::set('settings.' . $setting->name, $setting->value);
                }
            }
            $sharedData = [
                'unread_messages_count' => Contact::UnRead()->count(),
                'pages' => Page::MainPages()->Active()->WithoutHome()->orderBy('order')->get(),
            ];
            if (config('dashboard.enable_services')) {

                $sharedData['services'] = Service::get();
            }
            if (config('dashboard.enable_products')) {

                $sharedData['product_categories'] = Product_categories::Active()->get();
                $sharedData['products'] = Product::Active()->get();
            }
            if (config('dashboard.enable_crops')) {
                $sharedData['crops'] = Crops::Active()->get();
            }
            View::share($sharedData);
        }
    }
}

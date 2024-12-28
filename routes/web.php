<?php

use App\Http\Controllers\Website\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\SpeciesController;
use App\Http\Controllers\Website\ProductsController;
use App\Models\Product;
use App\Models\Product_categories;
use App\Models\Section;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', function () {
    return view('website.eei.pages.contact');
});
Route::get('/certificate', function () {
    return view('website.eei.pages.certificate');
});
Route::get('/about', function () {
    return view('website.eei.pages.about');
});
Route::get('/get-service', function () {
    return view('website.eei.pages.getService');
});
Route::get('/service-details', function () {
    return view('website.eei.pages.service-card-details');
});

Route::get('/categories', [CategoriesController::class, 'getAllCategories']);

Route::get('/', [CategoriesController::class, 'show'])->name('category.show');

Route::get('/categories/{id}', [CategoriesController::class, 'details'])->name('species.index');



// Route::get('/page/{page}', [HomeController::class, 'page'])->name('page');
// Route::get('/services/{serviceId}', [HomeController::class, 'serviceDetails'])->name('services.details');
// Route::post('/contact', [HomeController::class, 'contactMessage'])->name('contact.send');
// Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Route::get('set-locale/{locale}', function ($locale) {

//     session()->put('locale', $locale);
//     app()->setLocale(session()->get('locale'));
//     return redirect()->url('/end');
// })->name('locale.set');

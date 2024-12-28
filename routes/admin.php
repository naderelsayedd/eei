<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\PartenersController;
use App\Http\Controllers\Dashboard\PagesController;
use App\Http\Controllers\Dashboard\SectionsController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\MessageController;
use App\Http\Controllers\Dashboard\CropController;
use App\Http\Controllers\Dashboard\productCategoriesController;
use App\Http\Controllers\Dashboard\ServicesController;
use App\Http\Controllers\Dashboard\TeamsController;
use App\Models\Crops;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application dashboard. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('/pages', PagesController::class)->only('index', 'edit', 'update');
    Route::resource('/sections', SectionsController::class);
    Route::resource('/slider', SliderController::class);

    Route::resource('/services', ServicesController::class);

    Route::resource('/parteners', PartenersController::class);
    Route::resource('/product-Categories', productCategoriesController::class);

    Route::resource('/teams', TeamsController::class);





    Route::get('/activity-logs', [HomeController::class, 'activtyLogs'])->middleware(['is_superadmin'])->name('activity_logs');

    Route::resource('/categories', CategoriesController::class);
    Route::resource('/parteners', PartenersController::class);



    Route::prefix('messages')->as('messages.')->group(function () {
        Route::get('/', [MessageController::class, 'index'])->name('index');
        Route::get('/show/{message}', [MessageController::class, 'show'])->name('show');
        Route::post('/show/{message}', [MessageController::class, 'reply'])->name('reply');
    });

    Route::middleware('is_superadmin')->group(function () {
        //website settings routes
        Route::controller(SettingController::class)->prefix('setting')->as('setting.')->group(function () {
            Route::get('/update', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');
            Route::get('/new-address', 'editNewAddress')->name('new_address');
            Route::post('/new-address', 'updateNewAddress')->name('update_new_address');
        });

        //admins routes - for supervisor users only
        Route::controller(AdminsController::class)->prefix('admins')->as('admins.')->group(function () {
            Route::post('/{admin}/deactive', 'deActive')->name('deactive');
            Route::get('/bonned', 'bonned')->name('bonned_list');
            Route::post('/bonned/{admin}/reactive', 'reActive')->name('reactive');
            Route::get('/deleted', 'deleted')->name('deleted_list');
            Route::post('/deleted/{admin}/restore', 'restore')->name('restore');
            Route::get('/export', 'export')->name('export');
        });
        Route::resource('/admins', AdminsController::class)->except(['show', 'edit', 'update']);
    });
});


Auth::routes(['register' => false, 'confirm' => false]);

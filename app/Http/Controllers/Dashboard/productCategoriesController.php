<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Product_categories;
use App\Services\productCategoriesService;
use Exception;

class productCategoriesController extends Controller
{
    protected $model, $pagesModel;
    protected productCategoriesService $productcategoriesService;

    public function __construct(productcategoriesService $productcategoriesService)
    {
        $this->model = new Product_categories();
        $this->productcategoriesService = $productcategoriesService;
    }

    // show types list page
    public function index()
    {
        $types = $this->productcategoriesService->retrieve($this->model);
        return $this->productcategoriesService->displayView('dashboard.products.types.list', ['types' => $types]);
    }

    // Show the form for creating a new type.
    public function create()
    {
        return $this->productcategoriesService->displayView('dashboard.products.types.create');
    }

    // Store a newly created type.
    public function store(CreateProductCategoryRequest $request)
    {
        try{
            $this->productcategoriesService->store($this->model, $request->toArray());
            Session::flash('success', 'Product Category created successfully');
        } catch(Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // Display the specified resource.
    public function show($id)
    {
        //
    }

    //Show the form for editing the specified type.
    public function edit($id)
    {
        $type = $this->productcategoriesService->show($this->model, $id);
        return $this->productcategoriesService->displayView('dashboard.products.types.update', [
            'type' => $type,
        ]);
    }

    //Update the specified resource in storage.
    public function update(UpdateProductCategoryRequest $request, $id)
    {
        try{
            $this->productcategoriesService->update($this->model, $id, $request->toArray());
            Session::flash('success', 'Fish Type updates successfully');
        } catch(Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        try{
            $this->productcategoriesService->delete($this->model, $id);
            Session::flash('success', 'Fish Type deleted successfully');
        } catch(\Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }
}

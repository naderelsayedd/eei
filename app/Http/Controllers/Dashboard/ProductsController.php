<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Services\ProductsService;
use App\Exports\ProductsExport;
use App\Models\Product;
use App\Models\Product_categories;
use App\Services\productCategoriesService;
use App\Traits\ExcelTrait;
use Exception;

class ProductsController extends Controller
{
    use ExcelTrait;

    protected $model, $productcategoriesModel;
    protected productCategoriesService $productcategoriesService;
    protected ProductsService $productsService;

    public function __construct(productCategoriesService $productcategoriesService, ProductsService $productsService)
    {
        $this->productcategoriesModel = new Product_categories();
        $this->model = new Product();
        $this->productcategoriesService = $productcategoriesService;
        $this->productsService = $productsService;
    }

    // show products list page
    public function index()
    {
        $products = $this->productsService->retrieve($this->model);
        return $this->productsService->displayView('dashboard.products.list', ['products' => $products]);
    }

    // Show the form for creating a new section.
    public function create()
    {
        $types = $this->productcategoriesService->retrieveActive($this->productcategoriesModel)->sortBy('order');
        return $this->productsService->displayView('dashboard.products.create', ['types' => $types]);
    }

    // Store a newly created section.
    public function store(CreateProductRequest $request)
    {

        try{
            $this->productsService->storeProduct($request);
            Session::flash('success', 'Product created successfully');
        } catch(Exception $e) {
            Session::flash('error', 'Something went wrong ');
        }

        return Redirect::back();
    }

    // Display the specified resource.
    public function show($id)
    {
        //
    }

    //Show the form for editing the specified section.
    public function edit($id)
    {
        $product = $this->productsService->show($this->model, $id);
        $types = $this->productcategoriesService->retrieveActive($this->productcategoriesModel)->sortBy('order');
        return $this->productsService->displayView('dashboard.products.update', [
            'product' => $product,
            'types' => $types
        ]);
    }

    //Update the specified resource in storage.
    public function update(UpdateProductRequest $request, $id)
    {
        try{
            $this->productsService->updateProduct($id, $request);
            Session::flash('success', 'Product updates successfully');
        } catch(Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        try{
            $this->productsService->deleteProduct($id);
            Session::flash('success', 'Section deleted successfully');
        } catch(\Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // export all products as excel
    public function export()
    {
        return $this->exportExcel(new ProductsExport, 'products');
    }
}

<?php

namespace App\Services;
use App\Models\Product_categories;

class productCategoriesService extends BaseServices
{
    protected $model;

    public function __construct()
    {
        $this->model = new Product_categories();
    }

    public function retrieveActive($model)
    {
        return $this->model->Active()->get();
    }
}

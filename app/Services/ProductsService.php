<?php

namespace App\Services;

use App\Models\Product;
use App\Traits\ImageFunctions;

class ProductsService  extends BaseServices
{
    use ImageFunctions;

    protected $model;

    public function __construct()
    {
        $this->model = new Product();
    }

    public function storeProduct($data)
    {
        

        return $this->model->create([
            'name' => $data->name,
            'product_category_id' => $data->type,
            'image' => $this->storeImagePath($data->image, 'products'),
            'description' => $data->description,
            'content' => $data->content,
            'status' => $data->status,
            'package_size' => $data->package_size,
        ]);
    }

    public function updateProduct(int $id, $data)
    {
        $fish = $this->model->findOrFail($id);
        $fish->name = $data->name;
        $fish->product_category_id = $data->type;
        $fish->description = $data->description;
        $fish->content = $data->content;
        $fish->status = $data->status;
        $fish->package_size = $data->package_size;

        if ($data->image) {
            $fish->image = $this->replaceImage($fish->image, $data->image, 'products');
        }

        if ($fish->isDirty()) {
            $fish->save();
        }

        return $fish;
    }

    public function deleteProduct($id)
    {
        $fish = $this->model->findOrFail($id);
        $this->deleteIfExist($fish->image);
        $fish->delete();
    }
}

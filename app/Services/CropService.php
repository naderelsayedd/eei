<?php

namespace App\Services;

use App\Models\Crops;
use App\Traits\ImageFunctions;

class CropService extends BaseServices
{
    use ImageFunctions;

    protected $model;

    public function __construct()
    {
        $this->model = new Crops();
    }

    public function storeFish($data)
    {
        return $this->model->create([
            'name' => $data->name,
            'image' => $this->storeImagePath($data->image, 'fishes'),
            'description' => $data->description,
            'content' => $data->content,
            'status' => $data->status,            
        ]);
    }

    public function updateFish(int $id, $data)
    {
        $fish = $this->model->findOrFail($id);
        $fish->name = $data->name;
        $fish->description = $data->description;
        $fish->content = $data->content;
        $fish->status = $data->status;    

        if($data->image) {
            $fish->image = $this->replaceImage($fish->image, $data->image, 'fishes');
        }

        if($fish->isDirty()) {
            $fish->save();
        }

        return $fish;
    }

    public function deleteFish($id)
    {
        $fish = $this->model->findOrFail($id);
        $this->deleteIfExist($fish->image);
        $fish->delete();
    }
}

<?php

namespace App\Services;

use App\Models\Partener;
use App\Traits\ImageFunctions;

class PartenersService extends BaseServices
{
    use ImageFunctions;

    protected $model;

    public function __construct()
    {
        $this->model = new Partener();
    }

    public function storePartener($data)
    {
        return $this->model->create([
            'name' => $data->name,
            'image' => $this->storeUniqueImagePath($data->name,$data->image, 'parteners'),
            'link' => $data->link??'',
        ]);
    }

    public function updatePartener(int $id, $data)
    {
        $partener = $this->model->findOrFail($id);
        $partener->name = $data->name;
        $partener->link = $data->link;

        if($data->image) {
            $partener->image = $this->replaceImage($partener->image, $data->image, 'parteners', $data->name);
        }

        if($partener->isDirty()) {
            $partener->save();
        }

        return $partener;
    }

    public function deletePartener($id)
    {
        $partener = $this->model->findOrFail($id);
        $this->deleteIfExist($partener->image);
        $partener->delete();
    }
}

<?php

namespace App\Services;

use App\Models\Slider;
use App\Traits\ImageFunctions;

class SliderService extends BaseServices
{
    use ImageFunctions;

    protected $model;

    public function __construct()
    {
        $this->model = new Slider();
    }

    public function storeSlide($reqdata)
    {
        $data = [];
        $data['title'] = $reqdata->title;
        $data['subtitle'] = $reqdata->subtitle;
        $data['description'] = $reqdata->description;
        $data['order'] = $reqdata->order;
        $data['link_title'] = $reqdata->link_title;
        $data['link'] = $reqdata->link;
        $slider =  Slider::create($data);
        return $slider;
    }

    public function updateSlide(int $id, $data)
    {
        $slide = $this->model->findOrFail($id);
        $slide->title = $data->title;
        $slide->subtitle = $data->subtitle;
        $slide->description = $data->description;
        $slide->order = $data->order;
        $slide->link_title = $data->link_title;
        $slide->link = $data->link;

        if ($data->image) {
            $slide->image = $this->replaceImage($slide->image, $data->image, 'slides');
        }

        if ($slide->isDirty()) {
            $slide->save();
        }

        return $slide;
    }

    public function deleteSlide($id)
    {
        $slide = $this->model->findOrFail($id);
        $this->deleteIfExist($slide->image);
        $slide->delete();
    }
}

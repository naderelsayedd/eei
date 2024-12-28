<?php

namespace App\Services;

use App\Models\Page;
use App\Traits\ImageFunctions;

class PagesService extends BaseServices
{
    use ImageFunctions;

    protected $model;

    public function __construct()
    {
        $this->model = new Page();
    }

    public function retrieve($model)
    {
        return $this->model->get();
    }

    public function retrieveActive($model)
    {
        return $this->model->Active()->get();
    }
    public function retrievesectionsPages($model)
    {
        return $this->model->whereIn('id', array(1, 4))->get();
    }
    public function show($model, $id)
    {
        return $this->model->findOrFail($id);
    }
    
    public function updatePage(int $id, $data)
    {
        $page = $this->model->findOrFail($id);
        $page->status = $data->status;
        $page->order = $data->order;

        if($data->cover) {
            $page->cover = $this->replaceImage($page->cover, $data->cover, 'pages', $page->link);
        }

        if($page->isDirty()) {
            $page->save();
        }

        return $page;
    }
}

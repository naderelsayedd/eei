<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

abstract class BaseServices
{
    private function model($model): Model
    {
        return new $model;
    }
    
    public function retrieve($model)
    {
        return $this->model($model)->all();
    }

    public function displayView($path, array $with_data = null)
    {
        return view($path)->with($with_data);
    }
    
    public function store($model, array $data)
    {
         
        return $this->model($model)->create($data);
    }

    public function update($model, int $id, array $data)
    {
        $modelData = $this->model($model)->findOrFail($id);
        $modelData->update($data);

        return $modelData;
    }

    public function show($model, $id)
    {
        return $this->model($model)->findOrFail($id);
    }

    public function delete($model, $id)
    {
        $this->model($model)->findOrFail($id)->delete();
    }
}

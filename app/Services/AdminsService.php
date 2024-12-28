<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAdminMail;
use App\Models\User;

class AdminsService extends BaseServices
{
    protected $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function retrieve($model)
    {
        return $this->model->Active()->where('type', '!=', 'superadmin')->get();
    }

    public function storeAdmin($data)
    {
        $admin = $this->model->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'type' => 'admin',
            'status' => 1,
        ]);

        Mail::to($admin->email)->send(new NewAdminMail($data->name,$data->email,$data->password));
    }

    public function updateStatus($id, $status = 1)
    {
        return $this->model->findOrFail($id)->update(['status' => $status]);
    }

    public function retrieveBonned()
    {
        return $this->model->NotActive()->orderBy('updated_at')->get();
    }

    public function retrieveDeleted()
    {
        return $this->model->onlyTrashed()->orderBy('deleted_at')->get();
    }

    public function restore($id)
    {
        return $this->model->onlyTrashed()->findOrFail($id)->restore();
    }
}

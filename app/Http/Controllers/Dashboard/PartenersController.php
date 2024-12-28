<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePartenerRequest;
use App\Http\Requests\UpdatePartenerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Services\PartenersService;
use App\Models\Partener;
use Exception;

class PartenersController extends Controller
{
    protected $model;
    protected PartenersService $partenersService;

    public function __construct(PartenersService $partenersService)
    {
        $this->model = new Partener();
        $this->partenersService = $partenersService;
    }

    // show parteners list page
    public function index()
    {
        $parteners = $this->partenersService->retrieve($this->model);
        return $this->partenersService->displayView('dashboard.parteners.list', ['parteners' => $parteners]);
    }

    // Show the form for creating a new partener.
    public function create()
    {
        return $this->partenersService->displayView('dashboard.parteners.create');
    }

    // Store a newly created partener.
    public function store(CreatePartenerRequest $request)
    {
        try{
            $this->partenersService->storePartener($request);
            Session::flash('success', 'Partener created successfully');
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

    //Show the form for editing the specified partener.
    public function edit($id)
    {
        $partener = $this->partenersService->show($this->model, $id);
        return $this->partenersService->displayView('dashboard.parteners.update', ['partener' => $partener]);
    }

    // Update the specified partener.
    public function update(UpdatePartenerRequest $request, $id)
    {
        try{
            $this->partenersService->updatePartener($id, $request);
            Session::flash('success', 'Partener updated successfully');
        } catch(Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // Remove the specified partener.
    public function destroy($id)
    {
        try{
            $this->partenersService->deletePartener($id);
            Session::flash('success', 'Partener deleted successfully');
        } catch(Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }
}

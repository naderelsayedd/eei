<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\CropsExport;
use App\Exports\FishsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCropRequest;
use App\Http\Requests\UpdateCropRequest;
use App\Models\Crops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Services\CropService;
use App\Traits\ExcelTrait;
use Exception;
use Maatwebsite\Excel\Facades\Excel;

class CropController extends Controller
{
    use ExcelTrait;

    protected $model;
    protected CropService $cropService;

    public function __construct(CropService $cropService,)
    {
        $this->model = new Crops();
        $this->cropService = $cropService;
    }

    // show fishes.fish list page
    public function index()
    {
        $crops = $this->cropService->retrieve($this->model);
        return $this->cropService->displayView('dashboard.crops.crop.list', ['crops' => $crops]);
    }

    // Show the form for creating a new section.
    public function create()
    {
        return $this->cropService->displayView('dashboard.crops.crop.create');
    }

    // Store a newly created section.
    public function store(CreateCropRequest $request)
    {
        try {
            $this->cropService->storeFish($request);
            Session::flash('success', 'Crop created successfully');
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong' . $e->getMessage());
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
        $crop = $this->cropService->show($this->model, $id);

        return $this->cropService->displayView('dashboard.crops.crop.update', [
            'crop' => $crop
        ]);
    }

    //Update the specified resource in storage.
    public function update(UpdateCropRequest $request, $id)
    {
        try {
            $this->cropService->updateFish($id, $request);
            Session::flash('success', 'Crop updates successfully');
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        try {
            $this->cropService->deleteFish($id);
            Session::flash('success', 'Section deleted successfully');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // export all fishes as excel
    public function export()
    {
        return $this->exportExcel(new CropsExport, 'Crops');
    }
}

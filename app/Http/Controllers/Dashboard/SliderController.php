<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Services\SliderService;
use App\Models\Slider;
use Exception;

class SliderController extends Controller
{
    protected $model;
    protected SliderService $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->model = new Slider();
        $this->sliderService = $sliderService;
    }

    // show slider list page
    public function index()
    {
        $slides = $this->sliderService->retrieve($this->model);
        return $this->sliderService->displayView('dashboard.slider.list', ['slides' => $slides]);
    }

    // Show the form for creating a new slide.
    public function create()
    {
        return $this->sliderService->displayView('dashboard.slider.create');
    }

    // Store a newly created slide.
    public function store(CreateSlideRequest $request)
    {


        try{
            $this->sliderService->storeSlide($request);
            Session::flash('success', 'Slide created successfully');
        } catch(Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    //Show the form for editing the specified slide.
    public function edit($id)
    {
        $slide = $this->sliderService->show($this->model, $id);
        return $this->sliderService->displayView('dashboard.slider.update', ['slide' => $slide]);
    }

    // Update the specified slide.
    public function update(UpdateSlideRequest $request, $id)
    {
        try{
            $this->sliderService->updateSlide($id, $request);
            Session::flash('success', 'Slide updated successfully');
        } catch(Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // Remove the specified slide.
    public function destroy($id)
    {
        try{
            $this->sliderService->deleteSlide($id);
            Session::flash('success', 'Slide deleted successfully');
        } catch(Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }
}

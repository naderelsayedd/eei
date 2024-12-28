<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Services\SectionsService;
use App\Services\PagesService;
use App\Models\Section;
use App\Models\Page;
use App\Traits\ImageFunctions;
use Exception;

class SectionsController extends Controller
{
    use ImageFunctions;
    protected $model, $pagesModel;
    protected SectionsService $sectionsService;
    protected PagesService $pagesService;

    public function __construct(SectionsService $sectionsService, PagesService $pagesService)
    {
        $this->model = new Section();
        $this->pagesModel = new Page();
        $this->sectionsService = $sectionsService;
        $this->pagesService = $pagesService;
    }

    // show sections list page
    public function index()
    {
        $sections = $this->sectionsService->retrieve($this->model);
        return $this->sectionsService->displayView('dashboard.sections.list', ['sections' => $sections]);
    }

    // Show the form for creating a new section.
    public function create()
    {
        $pages = $this->pagesService->retrievesectionsPages($this->pagesModel)->sortBy('order');
        return $this->sectionsService->displayView('dashboard.sections.create', ['pages' => $pages]);
    }

    // Store a newly created section.
    public function store(CreateSectionRequest $request)
    {
        $data = $request->toArray();
        if ($request->background) {
            try {
                $data['background'] = $this->storeImagePath($request->background, 'section') ?? null;
            } catch (Exception $e) {
                $data['background'] = null;
            }
        }
        try {
            $this->sectionsService->store($this->model, $data);
            Session::flash('success', 'Section created successfully');
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong '.$e);
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
        $section = $this->sectionsService->show($this->model, $id);
        $pages = $this->pagesService->retrievesectionsPages($this->pagesModel)->sortBy('order');
        return $this->sectionsService->displayView('dashboard.sections.update', [
            'section' => $section,
            'pages' => $pages
        ]);
    }

    //Update the specified resource in storage.
    public function update(UpdateSectionRequest $request, $id)
    {
        try {
            $this->sectionsService->update($this->model, $id, $request->toArray());
            Session::flash('success', 'Section updates successfully');
        } catch (Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        try {
            $this->sectionsService->delete($this->model, $id);
            Session::flash('success', 'Section deleted successfully');
        } catch (\Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }
}

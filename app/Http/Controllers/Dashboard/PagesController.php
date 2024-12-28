<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Services\PagesService;
use App\Models\Page;
use Exception;

class PagesController extends Controller
{
    protected $model;
    protected PagesService $pagesService;

    public function __construct(PagesService $pagesService)
    {
        $this->model = new Page();
        $this->pagesService = $pagesService;
    }

    // show pages list page
    public function index()
    {
        $pages = $this->pagesService->retrieve($this->model);
        return $this->pagesService->displayView('dashboard.pages.list', ['pages' => $pages]);
    }

    //Show the form for editing the specified page.
    public function edit($id)
    {
        $page = $this->pagesService->show($this->model, $id);
        return $this->pagesService->displayView('dashboard.pages.update', ['page' => $page]);
    }

    // Update the specified page.
    public function update(UpdatePageRequest $request, $id)
    {
        try{
            $this->pagesService->updatePage($id, $request);
            Session::flash('success', 'Page updated successfully');
        } catch(Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Exports\AdminsExport;
use App\Traits\ExcelTrait;
use App\Services\AdminsService;
use App\Models\User;

class AdminsController extends Controller
{
    use ExcelTrait;

    protected $model;
    protected AdminsService $adminsService;

    public function __construct(AdminsService $adminsService)
    {
        $this->model = new User();
        $this->adminsService = $adminsService;
    }

    // show admins list page
    public function index()
    {
        $admins = $this->adminsService->retrieve($this->model);
        return $this->adminsService->displayView('dashboard.admins.list', ['admins' => $admins]);
    }

    // Show the form for creating a new admin.
    public function create()
    {
        return $this->adminsService->displayView('dashboard.admins.create');
    }

    // Store a newly created partener.
    public function store(CreateAdminRequest $request)
    {
        try{
            DB::beginTransaction();
                $this->adminsService->storeAdmin($request);
                Session::flash('success', 'Admin created successfully');
            DB::commit();
        } catch(\Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Something went wrong '.$e->getMessage());
        }

        return Redirect::back();
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        try{
            $this->adminsService->delete($this->model, $id);
            Session::flash('success', 'Admin deleted successfully');
        } catch(\Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // de-active admin
    public function deActive($id) {
        try{
            $this->adminsService->updateStatus($id, 0);
            Session::flash('success', 'Admin de active successfully');
        } catch(\Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // show bonned admins list (not active admins)
    public function bonned() {
        return $this->adminsService->displayView('dashboard.admins.bonned', [
            'bonneders' => $this->adminsService->retrieveBonned(),
        ]);
    }

    // re-active bonned admin
    public function reActive($id) {
        try{
            $this->adminsService->updateStatus($id, 1);
            Session::flash('success', 'Admin re active successfully');
        } catch(\Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // show deleted admins list
    public function deleted() {
        return $this->adminsService->displayView('dashboard.admins.deleted', [
            'deleted_admins' => $this->adminsService->retrieveDeleted(),
        ]);
    }

    // restore delted admin
    public function restore($id) {
        try{
            $this->adminsService->restore($id);
            Session::flash('success', 'Admin restored successfully');
        } catch(\Exception $e) {
            Session::flash('error', 'Something went wrong');
        }

        return Redirect::back();
    }

    // export all admins as excel
    public function export()
    {
        return $this->exportExcel(new AdminsExport, 'admins');
    }
}

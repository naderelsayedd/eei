<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateNewAddressRequest;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Services\SettingService;
use App\Models\Address;
use Exception;

class SettingController extends Controller
{
    protected SettingService $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }

    public function edit() {
        return $this->settingService->displayView('dashboard.setting.update');
    }

    public function update(UpdateSettingRequest $request) {
        try {
            $this->settingService->updateSetting($request);
            Session::flash('success', 'Setting updated successfully');
        } catch(Exception $e) {
            Session::flash('error', 'something went wrong');
        }

        return Redirect::back();
    }
	
	public function editNewAddress() {
		$address = Address::first();
        return $this->settingService->displayView('dashboard.setting.new_address', ['address' => $address]);

	}
	
	public function updateNewAddress(UpdateNewAddressRequest $request) {
        try {
            $this->settingService->updateNewAddress($request->toArray());
            Session::flash('success', 'Setting updated successfully');
        } catch(Exception $e) {
            Session::flash('error', 'something went wrong');
        }

        return Redirect::back();
    }
}

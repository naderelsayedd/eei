<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\Address;
use App\Traits\ImageFunctions;

class SettingService extends BaseServices
{
    use ImageFunctions;

    protected $model;

    public function __construct()
    {
        $this->model = new Setting();
    }

    public function updateSetting($request)
    {
        Setting::where('name', 'name')->update(['value' => $request->name]);
        Setting::where('name', 'email')->update(['value' => $request->email]);
        Setting::where('name', 'phone')->update(['value' => $request->phone]);
        Setting::where('name', 'address')->update(['value' => $request->address]);
        Setting::where('name', 'en_address')->update(['value' => $request->en_address]);
        Setting::where('name', 'ar_footer_about')->update(['value' => $request->ar_footer_about]);
        Setting::where('name', 'en_footer_about')->update(['value' => $request->en_footer_about]);
       
        Setting::where('name', 'location')->update(['value' => $request->location]);
        Setting::where('name', 'facebook')->update(['value' => $request->facebook]);
        Setting::where('name', 'inistagram')->update(['value' => $request->inistagram]);
        Setting::where('name', 'linked_in')->update(['value' => $request->linked_in]);
        Setting::where('name', 'twitter')->update(['value' => $request->twitter]);
        Setting::where('name', 'youtube')->update(['value' => $request->youtube]);
        if ($request->fav_icon) {
            $icon = Setting::where('name', 'fav_icon')->first();
            $icon->value = $this->replaceImage($icon->value, $request->fav_icon, 'setting', 'fav_icon');
            $icon->save();
        }

        if ($request->logo) {
            $logo = Setting::where('name', 'logo')->first();
            $logo->value = $this->replaceImage($logo->value, $request->logo, 'setting', 'logo');
            $logo->save();
        }

        if ($request->footer_logo) {
            $footer_logo = Setting::where('name', 'footer_logo')->first();
            $footer_logo->value = $this->replaceImage($footer_logo->value, $request->footer_logo, 'setting', 'footer_logo');
            $footer_logo->save();
        }
        if ($request->footer_cover) {
            $footer_cover = Setting::where('name', 'footer_cover')->first();
            $footer_cover->value = $this->replaceImage($footer_cover->value, $request->footer_cover, 'setting', 'footer_cover');
            $footer_cover->save();
        }

        if ($request->default_cover) {
            $default_cover = Setting::where('name', 'default_cover')->first();
            $default_cover->value = $this->replaceImage($default_cover->value, $request->default_cover, 'setting', 'default_cover');
            $default_cover->save();
        }
    }

    public function updateNewAddress($data)
    {
        $first_address = Address::first();
        if ($first_address) {
            $first_address->update($data);
        } else {
            Address::create($data);
        }
    }
}

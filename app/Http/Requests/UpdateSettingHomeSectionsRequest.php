<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingHomeSectionsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'services_en' =>'nullable|max:1500',
            'services_ar' =>'nullable|max:1500',
            'why_choose_us_en' =>'nullable|max:1500',
            'why_choose_us_ar' =>'nullable|max:1500',
            'about_us_en' =>'nullable|max:1500',
            'about_us_ar' =>'nullable|max:1500',
        ];
    }
}

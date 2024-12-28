<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
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
            'name' => 'nullable|string|min:1|max:255',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|min:11|max:13',
            'address' => 'nullable|string|max:255',
            'en_address' => 'nullable|string|max:255',
            'location' => 'nullable|url',
            'logo' => 'nullable|max:4000|mimes:jpeg,bmp,png,jpg,svg',
            'footer_logo' => 'nullable|max:4000|mimes:jpeg,bmp,png,jpg,svg',
            'footer_cover' => 'nullable|max:4000|mimes:jpeg,bmp,png,jpg,svg',
            'default_cover' => 'nullable|max:4000|mimes:jpeg,bmp,png,jpg,svg',

            'fav_icon' => 'nullable|max:2000|mimes:jpeg,bmp,png,jpg,ico,svg',
            'ar_footer_about' => 'nullable|string|max:255',
            'en_footer_about' => 'nullable|string|max:255',

            'facebook' => 'nullable|string|max:255',
            'inistagram' => 'nullable|string|max:255',
            'linked_in' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
        ];
    }
}

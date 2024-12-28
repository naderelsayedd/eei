<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSlideRequest extends FormRequest
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
            'order' => 'required|integer|gt:0|max:100',
            'image' => 'nullable|max:4000|mimes:jpeg,bmp,png,jpg,svg',
            'link_title' => 'required|string|max:255',
            'link' => 'required|url|max:800',
        ];
    }
}

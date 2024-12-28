<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
            'status' => 'required|in:0,1',
            'order' => 'required|integer|max:50',
            'cover' => 'nullable|max:4000|mimes:jpeg,bmp,png,jpg,svg',
        ];
    }
}

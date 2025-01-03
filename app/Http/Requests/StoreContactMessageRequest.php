<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactMessageRequest extends FormRequest
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
            'name' => 'required|string|min:10|max:200',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|digits_between:11,15',
            'subject' => 'string|min:10|max:255',
            'message' => 'string|max:5000',
        ];
    }
}

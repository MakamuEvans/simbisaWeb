<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'vendor_id'=>'required',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpeg,jpg,png',
            'price'=>'required',
            'status'=>'required'
        ];
    }
}

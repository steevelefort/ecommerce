<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "name" => "required|min:2|max:100",
            'description' => 'required',
            'price' => 'required|numeric|min:0|max:1000000',
            'vat' => 'required|numeric|min:0|max:100',
            'image' => 'required|image'
        ];
    }
}

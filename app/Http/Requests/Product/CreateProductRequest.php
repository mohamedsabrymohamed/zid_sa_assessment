<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name'                 => 'required|string|min:3|max:255',
            'description'          => 'required|string|min:3|max:1000',
            'price'                => 'required|numeric|max:100000',
            'quantity'             => 'required|numeric|max:10000000',
            'vat_included'         => 'required|boolean',
        ];
    }
}

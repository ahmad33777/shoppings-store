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
            'name' => 'required|string',
            'description' => 'required|string',
            'base_price' => 'required|string',
            'store_id' => 'required|not_in:-1',
            'discount_price' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The Poduct name required',
            'name.string' => 'must be text',
            'description.required' => 'The product  description must be  required',
            'description.string' => 'description must be text',
            'base_price.required' => 'Base price  required',
            'image.image' => 'image must br image png or jpg ..'
        ];
    }
}
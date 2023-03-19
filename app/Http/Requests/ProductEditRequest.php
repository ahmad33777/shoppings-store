<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
     * 
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
            'store_id' => 'required|string',
            'discount_price' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The store name required',
            'name.string' => 'must be text',
            'description.required' => 'The description name required',
            'description.required' => 'The description name required',
            'base_price.required' => 'Base price Required',
            'image.image' => 'logo must br image png or jpg ..'
        ];
    }
}
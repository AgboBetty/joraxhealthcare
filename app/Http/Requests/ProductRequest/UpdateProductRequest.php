<?php

namespace App\Http\Requests\ProductRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'type' => 'sometimes|required|string',
            'name' => 'required|string|max:255|min:5',
            'abbr' => 'required|string|max:255|min:3',
            'amount' => 'nullable|numeric',
            'about' => 'sometimes|required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'type.required'  => 'An item type maybe required',
            'type.string'  => 'An item type must be string',
            'name.required'  => 'An item name is required',
            'name.string'  => 'An item name must be string',
            'name.min'  => 'An item name must have a minimum of 5 characters',
            'name.max'  => 'An item name must have a maximum of 255 characters',
            'abbr.required'  => 'An item abbreviation is required',
            'abbr.string'  => 'An item abbreviation must be string',
            'abbr.min'  => 'An item abbreviation must have a minimum of 3 characters',
            'abbr.max'  => 'An item abbreviation must have a maximum of 255 characters',
            'amount.numeric'  => 'Minimum Amount must be numeric',
            'about.required'  => 'About field maybe required',
            'about.string'  => 'About field contents must be a string',
        ];
    }
}

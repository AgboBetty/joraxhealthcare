<?php

namespace App\Http\Requests\ParticularRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParticularRequest extends FormRequest
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
            'name' => 'required|string|max:50|min:5',
            'value' => 'required|string|max:10|min:3',
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
            'name.required'  => 'A name is required',
            'name.string'  => 'A name must be string',
            'name.min'  => 'A name must have a minimum of 5 characters',
            'name.max'  => 'A name must have a maximum of 50 characters',
            'value.required'  => 'A value is required',
            'value.string'  => 'A value must be string',
            'value.min'  => 'A value must have a minimum of 3 characters',
            'value.max'  => 'A value must have a maximum of 10 characters',
        ];
    }
}

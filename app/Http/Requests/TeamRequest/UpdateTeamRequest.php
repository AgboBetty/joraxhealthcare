<?php

namespace App\Http\Requests\TeamRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
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
            'type.required'  => 'A type maybe required',
            'type.string'  => 'A type must be string',
            'name.required'  => 'A name is required',
            'name.string'  => 'A name must be string',
            'name.min'  => 'A name must have a minimum of 5 characters',
            'name.max'  => 'A name must have a maximum of 255 characters',
            'abbr.required'  => 'A abbreviation is required',
            'abbr.string'  => 'A abbreviation must be string',
            'abbr.min'  => 'A abbreviation must have a minimum of 3 characters',
            'abbr.max'  => 'A abbreviation must have a maximum of 255 characters',
            'about.required'  => 'About field maybe required',
            'about.string'  => 'About field contents must be a string',
        ];
    }
}

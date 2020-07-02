<?php

namespace App\Http\Requests\ProfileRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'mail' => 'nullable|sometimes|email|max:100|min:5',
            'phone' => 'nullable|sometimes|string|max:25|min:5',
            'address' => 'nullable|sometimes|string|max:225|min:0',
            'city' => 'required|string|max:100|min:3',
            'state' => 'required|string|max:100|min:3',
            'country' => 'required|string|max:100|min:3',
            'zip_code' => 'nullable|sometimes|string:max:25|min:3',
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
            'mail.sometimes' => 'An email maybe required',
            'mail.email' => 'Email characters are not valid',
            'mail.max' => 'Email can not have more than 100 characters',
            'mail.min' => 'Email can not have less than 5 characters',
            'phone.sometimes' => 'A phone maybe required',
            'phone.string' => 'Phone characters are not valid',
            'phone.max' => 'Phone can not have more than 25 characters',
            'phone.min' => 'Phone can not have less than 5 characters',
            'address.sometimes' => 'An address maybe required',
            'address.string' => 'Address characters are not valid',
            'address.max' => 'Address can not have more than 225 characters',
            'address.min' => 'Address can not have less than 0 characters',
            'city.required' => 'A city is required',
            'city.string' => 'City characters are not valid',
            'city.max' => 'City can not have more than 100 characters',
            'city.min' => 'City can not have less than 3 characters',
            'state.required' => 'A state is required',
            'state.string' => 'State characters are not valid',
            'state.max' => 'State can not have more than 100 characters',
            'state.min' => 'State can not have less than 3 characters',
            'country.required' => 'A country is required',
            'country.string' => 'Country characters are not valid',
            'country.max' => 'Country can not have more than 100 characters',
            'country.min' => 'Country can not have less than 3 characters',
            'zip_code.sometimes' => 'A zip code maybe required',
            'zip_code.string' => 'Zip code characters are not valid',
            'zip_code.max' => 'Zip code can not have more than 100 characters',
            'zip_code.min' => 'Zip code can not have less than 100 characters',
        ];
    }
}

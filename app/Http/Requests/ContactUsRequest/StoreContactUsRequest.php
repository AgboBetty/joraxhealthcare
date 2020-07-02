<?php

namespace App\Http\Requests\ContactUsRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactUsRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:25|min:3',
            'company' => 'nullable|string|max:100',
            'message' => 'required|string',
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
            'name.string'  => 'Name characters are not valid',
            'name.max'  => 'A name can not have more than 50 characters',
            'email.required'  => 'An email is required',
            'email.email'  => 'Email characters are not valid',
            'email.max'  => 'An email can not have more than 100 characters',
            'phone.string'  => 'Phone characters are not valid',
            'phone.max'  => 'A phone number can not have more than 25 characters',
            'phone.min'  => 'A phone number can not have less than 3 characters',
            'company.string'  => 'Company name characters are not valid',
            'company.max'  => 'A company name can not have more than 100 characters',
            'message.required'  => 'A message is required',
            'message.string'  => 'Message characters are not valid',
        ];
    }
}

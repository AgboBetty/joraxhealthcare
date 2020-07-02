<?php

namespace App\Http\Requests\SubscriptionRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionRequest extends FormRequest
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
            'email' => 'required|email|max:100',
            'code' => 'required|string|max:100',
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
            'email.required'  => 'An email is required',
            'email.email'  => 'Email characters are not valid',
            'email.max'  => 'An email can not have more than 100 characters',
            'code.required'  => 'An code is required',
            'code.string'  => 'Code characters are not valid',
            'code.max'  => 'An code can not have more than 100 characters',
        ];
    }
}

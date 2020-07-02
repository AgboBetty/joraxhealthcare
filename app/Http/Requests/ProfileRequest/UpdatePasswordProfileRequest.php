<?php

namespace App\Http\Requests\ProfileRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordProfileRequest extends FormRequest
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
            'old_password' => 'required|string|min:8|',
            'new_password' => 'required|string|min:8|confirmed',
            'new_password_confirmation' => 'required|same:new_password',
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
            'old_password.required'  => 'Old password is required',
            'old_password.string' => 'Old password characters are not valid',
            'old_password.min' => 'Old password can not have less than 8 characters',
            'new_password.required'  => 'A new password is required',
            'new_password.string' => 'Password characters are not valid',
            'new_password.min' => 'Password can not have less than 8 characters',
            'new_password.confirmed'  => 'Password does not match passwords confirmation',
            'new_password_confirmation.required'  => 'A new password confirmation is required',
            'new_password_confirmation.same'  => 'Passwords confirmation does not match password',
        ];
    }
}

<?php

namespace App\Http\Requests\ProfileRequest;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBankingProfileRequest extends FormRequest
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
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'account_number' => 'required|numeric|min:0',
            'account_type' => 'required|in:savings,current,other',
            'bank_name' => 'required|string|max:100',
            'bvn_number' => 'sometimes|string|max:15',
            'date_of_birth' => 'required|date',
            'additional_details' => 'nullable|string|max:200',
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
            'first_name.required' => 'A first name is required',
            'first_name.string' => 'First name characters are not valid',
            'first_name.max' => 'First name can not have more than 100 characters',
            'last_name.required' => 'A last name is required',
            'last_name.string' => 'Last name characters are not valid',
            'last_name.max' => 'Last name can not have more than 100 characters',
            'account_number.required' => 'An account number is required',
            'account_number.numeric' => 'Account number characters are not valid',
            'account_number.min' => 'Account number can not have less than 1 character',
            'account_type.required' => 'Account type is required',
            'account_type.in' => 'Account type characters are not valid',
            'bank_name.required' => 'A bank name is required',
            'bank_name.string' => 'Bank name characters are not valid',
            'bank_name.max' => 'Bank name can not have more than 100 characters',
            'bvn_number.sometimes' => 'A BVN/SSN number maybe required',
            'bvn_number.string' => 'BVN/SSN number characters are not valid',
            'bvn_number.max' => 'BVN/SSN number can not have more than 15 characters',
            'date_of_birth.required' => 'Date of birth is required',
            'date_of_birth.date' => 'Date of birth characters are not valid',
            'additional_details.string' => 'Additional details characters are not valid',
            'additional_details.max' => 'Additional details can not have more than 200 characters',
        ];
    }
}

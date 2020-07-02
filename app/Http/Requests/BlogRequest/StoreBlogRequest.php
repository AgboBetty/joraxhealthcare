<?php

namespace App\Http\Requests\BlogRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'title' => 'required|string|max:100',
            'category' => 'required|in:news,product,event',
            'text' => 'required|string|min:50',
            'photo' => 'image|dimensions:min_width=250,min_height=250|max:1999',
            'no_image' => 'string'
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

            'name.required' => 'Name is required',
            'name.string' => 'Name characters are not valid',
            'name.max' => 'Name can not have more than 100 characters',

            'title.required' => 'Title is required',
            'title.string' => 'Title characters are not valid',
            'title.max' => 'Title can not have more than 100 characters',

            'category.required' => 'Category is required',
            'category.in' => 'Category characters are not valid',

            'text.required' => 'Text is required',
            'text.string' => 'Text characters are not valid',
            'text.min' => 'Text can not have less than 50 characters',

            'photo.image' => 'Photo must be an image',
            'photo.dimensions' => 'Image dimensions are a minimum width:250 and a minimum height:250',
            'photo.max' => 'Image size must be less than 2MB',
            'no_image.boolean' => 'No image is not valid',
        ];
    }
}

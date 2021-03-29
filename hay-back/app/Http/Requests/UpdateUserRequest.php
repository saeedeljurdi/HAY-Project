<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|max:50|bail',
            'image' => 'nullable',
            'occupation' => 'required|max:255|bail',
            'education' => 'required|max:255|bail',
            'interests' => 'required|max:255|bail',

        ];
    }
    public function messages()
    {
        return [
           
            'name.required' => 'Name is required!',
            'name.max' => 'Name must me max of 50 characters!',
             
            'occupation.required' => 'occupation is required!',
            'occupation.max' => 'occupation must be max of 255 characters!',

            'education.required' => 'occupation is required!',
            'education.max' => 'occupation must be max of 255 characters!',

            'interests.required' => 'interests is required!',
            'interests.max' => 'interests must be max of 255 characters!',

        ];
    }
}

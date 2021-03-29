<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AddUserRequest extends FormRequest
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
            'email' => 'required|email|unique:user|bail',
            'name' => 'required|max:50|bail',
            'password' => 'required|min:6|bail',
            'image' => 'nullable',
            'phone' => 'required|numeric|unique:user|bail',
            'age' => 'required|numeric|bail',
            'occupation' => 'required|max:255|bail',
            'education' => 'required|max:255|bail',
            'area' => 'required',
            'interests' => 'required|max:255|bail',

        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'email.email' => 'Email must be of type email!',
            'email.unique' => 'Email must be unique!',
            'name.required' => 'Name is required!',
            'name.max' => 'Name must me max of 50 characters!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must contain at least 6 character!',

            'phone.required' => 'phone is required!',
            'phone.numeric' => 'phone must be a number!',
            'phone.unique' => 'phone number must be unique!',

            'age.required' => 'age is required!',
            'age.numeric' => 'age must be a number!',

            'occupation.required' => 'occupation is required!',
            'occupation.max' => 'occupation must be max of 255 characters!',

            'education.required' => 'occupation is required!',
            'education.max' => 'occupation must be max of 255 characters!',

            'area.required' => 'area is required!',

            'interests.required' => 'interests is required!',
            'interests.max' => 'interests must be max of 255 characters!',

        ];
    }
}

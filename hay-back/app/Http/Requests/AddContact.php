<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AddContact extends FormRequest
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
            'name' => 'required',
            'email' => 'email|required|bail',
            'phone_number' => 'min:8|max:15|required|bail',
            'message' => 'required',

        ];
    }

    public function messages()
    {
        return
        [
            'name.required' => 'Name is required!',
            'email.required' => 'Email is required!',
            'email.email' => 'Email must be of type email!',
            'phone_number.required' => 'Phone is required!',
            'message.required' => 'Message is required',
            'phone_number.min' => 'At least 8 characters!',
            'phone_number.max' => 'Phone number invalid!!',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}

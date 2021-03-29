<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAdmin extends FormRequest
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
            'firstname' => 'required|bail|min:3|max:55|regex:/[a-z]/',
            'lastname'  =>'required|min:3|max:55|regex:/[a-z]/',
            'email' =>  'required|bail|email',
            'username' => 'required|string|bail|min:6|regex:/[a-z]/',
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
            'firstname.min'  => 'Firstname minimum length 3',
            'firstname.max'  => 'Firstname maximum lenth 55',
            'firstname.regex' => 'Firstname accept only lowercase letter or uppercase letter',
           
            'lastname.min'  => 'Lastname minimum length 3',
            'lastname.max'  => 'Lastname maximum lenth 55',
            'lastname.regex' => 'lastname accept only lowercase letter or uppercase letter',
            
            'email.unique' => 'Email already Exist.',
            'email.required' => 'Email is required!',
            'email.email' => 'Email must be of type email!',
            
            'username.required' => 'Username is required!',
            'username.min'  => 'Username minimun length 6',
            'username.regex' => 'Username must contain at least one lowercase letter',
        
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => $validator->errors()], 422));
    }
}

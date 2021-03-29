<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSessionRequest extends FormRequest
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
            'user_id' => 'unique:user_session',

        ];
    }
    public function messages()
    {
        return [
           
            'user_id.unique' => 'You have already Booked a session!',
            

        ];
    }
}

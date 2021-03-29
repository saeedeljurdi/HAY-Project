<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PsychologistRequest extends FormRequest
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
            'name_ar' => 'required|max:55|bail',
            'name_en' => 'required|max:55|bail',
            'description_ar' => 'required|max:255|bail',
            'description_en' => 'required|max:255|bail',
          
        ];
    }

    public function messages()
    {
        return [
           
            'name_ar.required' => 'Name is required!',
            'name_en.required' => 'Name is required!',
            'name_en.max' => 'Name should contain a maximum of 55 characters!',
            'name_ar.max' => 'Name should contain a maximum of 55 characters!',

            'description_ar.required' => 'description is required!',
            'description_en.required' => 'description is required!',
            'description_ar.max' => 'description must be maximum 255 characters!',
            'description_en.max' => 'description must be maximum 255 characters!',

        ];
    }
}


<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TherapyRequest extends FormRequest
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
            'title_en' => 'required|max:55|bail',
            'title_ar' => 'required|max:55|bail',
            'description_ar' => 'required|max:255|bail',
            'description_en' => 'required|max:255|bail',
 
        ];
    }

    public function messages()
    {
        return [
           
            'title_ar.required' => 'title is required!',
            'title_en.required' => 'title is required!',
            'title_en.max' => 'title should contain a maximum of 55 characters!',
            'title_ar.max' => 'title should contain a maximum of 55 characters!',
            'description_ar.required' => 'description is required!',
            'description_en.required' => 'description is required!',
            'description_ar.max' => 'description must be maximum 255 characters!',
            'description_en.max' => 'description must be maximum 255 characters!',

        ];
    }
}


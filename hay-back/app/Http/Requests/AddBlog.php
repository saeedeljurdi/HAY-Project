<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class AddBlog extends FormRequest
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
            'title_en' => 'required',
            'title_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return 
        [
            'title_en.required' => 'English title is required!',
            'title_ar.required' => ' Arabic title is required!',
            'description_en.required' => 'English description is required!',
            'description_ar.required' => 'Arabic description is required!',
            'image.required' => 'Image is required!',
        ];
    }
    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response()->json($validator->errors(), 422));
    // }
}

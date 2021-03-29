<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateBlogs extends FormRequest
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
            // 'title_ar' => 'required',
            'description_en' => 'required',
            // 'description_ar' => 'required',
            // 'image' => 'required'
        ];
    }
    
    public function messages()
    {
        return 
        [
            'title_en.required' => 'title is required',
            
            // 'title_ar.required' => 'title is required',
            
            'description_en.required' => 'description is required',
            
            // 'description_ar.required' => 'description is required',
            
            // 'image.required' => 'image is required!',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}

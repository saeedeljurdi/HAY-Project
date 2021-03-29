<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class HomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            'missions_title_ar' => 'required|bail|min:3|max:55',
            'missions_ar'  =>'required|max:500',
            'missions_title_en' =>  'required|bail|min:3|max:55',
            'missions_en' => 'required|max:500',
            'visions_title_ar' =>'required|bail|min:3|max:55',
            'visions_ar'     =>'required|max:500' ,
            'visions_title_en' =>'required|bail|min:3|max:55', 
            'visions_en'     => 'required|max:500',
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
         'missions_title_ar.required' => 'Missions Title is required',
         'missions_ar.required' => 'Missions is required',
         'missions_title_en.required' => 'Missions Title is required',
         'missions_en.required' => 'Missions is required',
         'visions_title_ar.required' => 'visions Title is required',
         'visions_ar.required' => 'visions is required',
         'visions_title_en.required' => 'visions Title is required',
         'visions_en.required' => 'visions is required',

         'missions_title_ar.min' => 'Missions Title is required',
         'missions_title_en.min' => 'Missions Title is required',
         'visions_title_ar.min' => 'visions Title is required',
         'visions_title_en.min' => 'visions Title is required',

         'missions_title_ar.max' => 'Missions Title must be 55 chars maximum',
         'missions_ar.max' => 'Missions must be 500 chars maximum',
         'missions_title_en.max' => 'Missions Title must be 55 chars maximum',
         'missions_en.max' => 'Missions must be 500 chars maximum',
         'visions_title_ar.max' => 'Missions Title must be 55 chars maximum',
         'visions_ar.max' => 'Missions must be 500 chars maximum',
         'visions_title_en.max' => 'Missions Title must be 55 chars maximum',
         'visions_en.max' => 'Missions must be 500 chars maximum',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }

}

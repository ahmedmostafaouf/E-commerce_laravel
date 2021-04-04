<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryReq extends FormRequest
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
            'name'=>'required|min:3',
            'description'=>'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'this field Required',
            'name.min'=>'this field should be more than 3 character',
            'description.required'=>'this field Required',
            'description.min'=>'this field should be more than 3 character',

        ];
    }
}

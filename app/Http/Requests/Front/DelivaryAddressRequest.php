<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class DelivaryAddressRequest extends FormRequest
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
            'name'=>'required',
            //'phone'=>'required|min:11|max:11|numeric',
            'email'=>'required|email|unique:users,email,'.$this->id,
            'address'=>'required|string|max:25|min:5',
            'city'=>'required|string|max:20',
            'state'=>'required|string|min:3|max:20'
        ];
    }
}

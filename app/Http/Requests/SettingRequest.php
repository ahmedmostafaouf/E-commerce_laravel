<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'desc'=>'required|string',
            'address'=>'required|string',
            'email'=>"required|email",
            'phone'=>'numeric',
            'fac_url'=>'required|url',
            'whats_url'=>'required|url',
            'youtube_url'=>'required|url',
            'ln_url'=>'required|url',
            'tw_url'=>'required|url',

        ];
    }
}

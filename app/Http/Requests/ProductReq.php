<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductReq extends FormRequest
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
            'purchase_price'=>'required|int',
            'sale_price'=>'required|int',
            'stock'=>'required|int',//stok==>>quantity
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'this field Required',
            'name.min'=>'this field should be more than 3 character',
            'description.required'=>'this field Required',
            'description.min'=>'this field should be more than 3 character',
            'purchase_price.required'=>'this field Required',
            'purchase_price.int'=>'this field should be number ',
            'sale_price.required'=>'this field Required',
            'sale_price.int'=>'this field should be number ',
            'stock.required'=>'this field Required',
            'stock.int'=>'this field should be number ',
        ];
    }
}

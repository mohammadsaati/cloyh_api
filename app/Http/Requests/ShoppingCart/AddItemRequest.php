<?php

namespace App\Http\Requests\ShoppingCart;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class AddItemRequest extends FormRequest
{



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "product_id"        =>  "required|exists:products,id" ,
            "count"             =>  "required|min:1"
        ];
    }
}

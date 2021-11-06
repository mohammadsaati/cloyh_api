<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "phone_number"          =>  "required|min:11" ,
            "password"              =>  "required|min:6" ,
            "activation-code"       =>  "required"
        ];
    }
}

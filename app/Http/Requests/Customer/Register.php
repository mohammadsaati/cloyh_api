<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name"            => "required|min:3",
            "last_name"             => "required|min:3",
            "phone_number"          => "required|min:11",
            "password"              => "required|min:6",
        ];
    }
}

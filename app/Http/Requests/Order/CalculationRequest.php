<?php

namespace App\Http\Requests\Order;

use App\Classes\Order\Calculations\SimpleCalculation;
use App\Services\Order\OrderCalculationService;
use Illuminate\Foundation\Http\FormRequest;

class CalculationRequest extends FormRequest
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
       return OrderCalculationService::getCalculationValidation(new SimpleCalculation());
    }
}

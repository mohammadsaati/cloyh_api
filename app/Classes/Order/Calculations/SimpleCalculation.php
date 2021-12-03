<?php

namespace App\Classes\Order\Calculations;

use App\Classes\Order\BaseCalculation;
use App\Services\Interfaces\Order\CalculationInterFace;
use phpDocumentor\Reflection\Types\Parent_;

class SimpleCalculation extends BaseCalculation implements CalculationInterFace
{

    public function calculation($request)
    {

    }

    public function calculationValidation(): array
    {
        return $this->validation();
    }
}

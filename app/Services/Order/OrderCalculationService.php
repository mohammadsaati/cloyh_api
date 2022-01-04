<?php

 namespace App\Services\Order;

 use App\Models\Order;
 use App\Services\Interfaces\Order\CalculationInterFace;
 use App\Services\Service;

 class OrderCalculationService extends Service
{

 	public function model()
	{
        $this->model = Order::class;
	}


    public function calculation(CalculationInterFace $calculationInterFace , $request)
    {
        return $calculationInterFace->calculation($request);
    }

     public static function StaticCalculation(CalculationInterFace $calculationInterFace , $request)
     {
        return $calculationInterFace->calculation($request);
     }

    public static function getCalculationValidation(CalculationInterFace $calculationInterFace) : array
    {
        return $calculationInterFace->calculationValidation();
    }

 }

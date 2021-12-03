<?php

 namespace App\Services\Order;

 use App\Models\Order;
 use App\Services\Service;

 class OrderCalculationService extends Service
{

 	public function model()
	{
        $this->model = Order::class;
	}

 }

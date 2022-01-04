<?php

 namespace App\Services\Order;

 use App\Classes\Order\Calculations\SimpleCalculation;
 use App\Models\Order;
 use App\Services\Interfaces\Order\OrderSubmitInterface;
 use App\Services\Service;

 class OrderService extends Service
{

 	public function model()
	{
        $this->model = Order::class;
	}
     public function submitOrder(OrderSubmitInterface $orderInterFace , $data)
     {
         $orderInterFace->submit($data);
     }

 }

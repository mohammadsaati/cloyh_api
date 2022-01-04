<?php

 namespace App\Services;

 use App\Models\Order;
 use App\Services\Service;

 class OrderService extends Service
{

 	public function model()
	{
        $this->model = Order::class;
	}

 }

<?php

 namespace App\Services;

 use App\Models\CustomerAddress;
 use App\Services\Service;

 class AddressService extends Service
{

 	public function model()
	{
        $this->model = CustomerAddress::class;
	}

     public function showAddress()
     {
         return request()->get("user")->customer->address;
     }
 }

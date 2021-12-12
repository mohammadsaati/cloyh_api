<?php

 namespace App\Services;

 use App\Models\Item;
 use App\Models\Vendor;
 use App\Services\Service;

 class VendorProductService extends Service
{

 	public function model()
	{
        $this->model = Item::class;
	}

     public function show(Item $item , Vendor $vendor)
     {
         return $vendor->products()->where("item_id" , $item->id)->get();
     }
 }

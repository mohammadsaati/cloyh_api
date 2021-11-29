<?php

 namespace App\Services;

 use App\Models\ShoppingCart;
 use App\Services\Interfaces\ShoppingCartInterFace;
 use App\Services\Service;

 class ShoppingCartService extends Service
{

 	public function model()
	{
        return ShoppingCart::class;
	}

     public function createNewShoppingCart( ShoppingCartInterFace $cartInterFace , $request )
     {
            return $cartInterFace->store($request);
     }

     public function addOrdUpdate(ShoppingCartInterFace $cartInterFace , $request)
     {

     }
 }

<?php

 namespace App\Services;

 use App\Models\Product;
 use App\Services\Service;

 class ProductService extends Service
{

 	public function model()
	{
        $this->model = Product::class;
	}

     public static function GetColors($products) :array
     {
            $colors = [];

            foreach ($products as $product)
            {

                $colors[] = [
                    "name"              =>  $product->color->name ,
                    "code"              =>  $product->color->value ,
                ];
            }

            return $colors;
     }

     public static function GetSize($products) :array
     {
         $sizes = [];

         foreach ($products as $product)
         {
             $sizes[] = [
                    "value"     =>  $product->size->value
             ];
         }

         return $sizes;
     }

 }

<?php

 namespace App\Services;

 use App\Models\Price;
 use App\Services\Service;
 use Carbon\Carbon;

 class PriceService extends Service
{

 	public function model()
	{
        $this->model = Price::class;
	}

     public static function CheckDeadLine($price)
     {
         if ($price->off_deadline && $price->discount)
         {
             $today = Carbon::now();
             $dead_line = Carbon::parse($price->off_deadline);

             if ( $today->greaterThan($dead_line) )
             {
                 $price->discount = 0;
             } else {
                 $price->after = $price->discount;
             }
         }

         return $price;
     }
 }

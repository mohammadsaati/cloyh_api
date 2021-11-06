<?php

namespace App\Http\Resources\Price;

use App\Services\PriceService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PriceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($price){

            $price = PriceService::CheckDeadLine($price);

            return [
                "id"                    =>  (int)$price->id ,
                "after"                 =>  (int)$price->after ,
                "before"                =>  (int)$price->before ,
                "discount"              =>  (int)$price->discount ,
                "off_deadline"          =>  $price->off_deadline
            ];
        });
    }
}

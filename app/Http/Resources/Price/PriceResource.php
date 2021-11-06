<?php

namespace App\Http\Resources\Price;

use App\Services\PriceService;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $price  = PriceService::CheckDeadLine($this->resource);

        return [
            "price"                 =>  (int)$price->after ,
            "before"                =>  (int)$price->before ,
            "discount"              =>  (int)$price->discount ,
            "off_deadline"          =>  $price->off_deadline
        ];
    }
}

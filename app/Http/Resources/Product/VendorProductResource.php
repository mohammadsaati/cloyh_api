<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Price\PriceCollection;
use App\Http\Resources\Price\PriceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id"                        =>  $this->id ,
            "color"                     =>  [
                                                "color"     =>  $this->color->name ,
                                                "code"     =>  $this->color->value
                                            ] ,
            "size"                      =>  $this->size->value ,
            "stock"                     =>  (int) $this->stock ,
            "current_price"             =>  new PriceResource( $this->prices->first() ) ,
            "price_changes"             =>  new PriceCollection( $this->Prices )
        ];
    }
}

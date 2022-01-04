<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AddressCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($address) {
            return [
                "id"                =>  $address->id ,
                "city"              =>  $address->city->name ,
                "full_address"      =>  $address->full_address ,
                "phone_number"      =>  $address->phone_number
            ];
        });
    }
}

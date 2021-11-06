<?php

namespace App\Models;

use App\Filters\VendorProductFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    use HasFactory;

    /*************************************
     * *********** #Relations ************
     *************************************/

    public function vendor()
    {
        return $this->belongsTo(Vendor::class , "vendor_id");
    }

    protected function product()
    {
        return $this->belongsTo(Product::class , "product_id");
    }

    /*************************************
     * *********** #Relations ************
     *************************************/

    /**************************************
     * ************ #Scope ****************
     *************************************/

    public function scopeFilter($query , VendorProductFilter $filter)
    {
        return $filter->apply($query);
    }

    /**************************************
     * ************ #Scope ****************
     *************************************/

}

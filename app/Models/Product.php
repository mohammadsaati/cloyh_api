<?php

namespace App\Models;

use App\Filters\ProductFilter ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**********************************
     * ************ Relations *********
     **********************************/

    public function item()
    {
        return $this->belongsTo(Item::class , "item_id");
    }

    public function prices()
    {
        return $this->hasMany(Price::class , "product_id");
    }

    public function vendor()
    {
        return $this->belongsToMany(Vendor::class , "vendor_products" , "product_id" , "vendor_id")->withTimestamps();
    }

    public function vendorProducts()
    {
        return $this->hasMany(VendorProduct::class , "product_id");
    }

    public function color()
    {
        return $this->belongsTo(Color::class , "color_id");
    }

    public function size()
    {
        return $this->belongsTo(Size::class , "size_id");
    }

    /**********************************
     * ************ Relations *********
     **********************************/


    /************************************
     * *********** #Scope ***************
     ************************************/

    public function ScopeFilter($query ,ProductFilter $filter)
    {
        return $filter->apply($query);
    }

    /************************************
     * *********** #Scope ***************
     ************************************/

}

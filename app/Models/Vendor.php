<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    /*******************************************
     * ************* #Relations ****************
     *******************************************/

    public function user()
    {
        return $this->belongsTo(User::class , "user_id");
    }

    public function products()
    {
        return $this->belongsToMany(Product::class , "vendor_products" , "vendor_id" , "product_id");
    }

    /*******************************************
     * ************* #Relations ****************
     *******************************************/

}

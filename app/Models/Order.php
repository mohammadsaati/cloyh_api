<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id"               ,       "address_id"        ,
        "discount"              ,       "off_amount"        ,
        "amount"
    ];


    /***********************************************
     * *************** Relations *******************
     ****************** START  *******************/

    public function items()
    {
        return $this->hasMany(OrderItem::class , "order_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class , "user_id");
    }

    public function address()
    {
        return $this->belongsTo(CustomerAddress::class , "address_id");
    }

    /***********************************************
     * *************** Relations *******************
     ******************  END  *******************/

}

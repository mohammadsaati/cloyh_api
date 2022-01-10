<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
      "city_id"     ,   "user_id"
    ];

    /**********************************
     * ********* #Relations **********
     *********************************/

    public function activationCodes()
    {
        return $this->hasMany(ActivationCode::class , "customer_id");
    }

    public function user()
    {
        return $this->hasOne(User::class , "user_id");
    }

    public function address()
    {
        return $this->hasMany(CustomerAddress::class , "customer_id");
    }

    public function orders()
    {
        return $this->hasMany(Order::class , "user_id");
    }

    public function city()
    {
        return $this->belongsTo(City::class , "city_id");
    }

    /**********************************
     * ********* #Relations **********
     *********************************/

}

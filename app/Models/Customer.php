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

    /**********************************
     * ********* #Relations **********
     *********************************/

}

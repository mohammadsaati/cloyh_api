<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;

    /**********************************
     * ********* #Relations **********
     *********************************/

    public function city()
    {
        return $this->belongsTo(City::class , "city_id");
    }

    /**********************************
     * ********* #Relations **********
     *********************************/
}

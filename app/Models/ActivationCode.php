<?php

namespace App\Models;

use App\Scope\ActiveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    use HasFactory;
    protected $fillable = [
        "customer_id"           ,           "code"          ,
        "expiry_time"           ,           "is_used"
    ];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope("is_used" , [0]));
    }

    /******************************************
     * ******** #Relations *******************
     *****************************************/

    public function customer()
    {
        return $this->belongsTo(Customer::class , "customer_id");
    }

    /******************************************
     * ******** #Relations *******************
     *****************************************/

}

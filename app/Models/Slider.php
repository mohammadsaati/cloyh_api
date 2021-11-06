<?php

namespace App\Models;

use App\Scope\ActiveScope;
use App\Scope\OrderScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope( new ActiveScope() );
        static::addGlobalScope( new OrderScope("priority") );
    }

    /********************************
     * ******** #relation func ******
     ********************************/

    /********************************
     * ******** #relation func ******
     ********************************/


    /********************************
     * ******** #scope func ********
     ********************************/



    /********************************
     * ******** #scope func ********
     ********************************/


    /********************************
     * ******** #Static func ********
     ********************************/



    /********************************
     * ******** #Static func ********
     ********************************/
}

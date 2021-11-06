<?php

namespace App\Models;

use App\Scope\ActiveScope;
use App\Scope\OrderScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope( new ActiveScope() );
        static::addGlobalScope( new OrderScope() );
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

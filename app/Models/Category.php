<?php

namespace App\Models;

use App\Scope\ActiveScope;
use App\Scope\OrderScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope( new ActiveScope("status" , [1 ,2]) );
        static::addGlobalScope( new OrderScope() );
    }

    /********************************
     * ******** #relation func ******
     ********************************/

    public function items()
    {
        return $this->hasMany(Item::class , "category_id");
    }

    /********************************
     * ******** #relation func ******
     ********************************/


    /********************************
     * ******** #scope func ********
     ********************************/

    public function scopeParent($query)
    {
        return $query->where("parent_id" , null);
    }

    /********************************
     * ******** #scope func ********
     ********************************/


    /********************************
     * ******** #Static func ********
     ********************************/

    public static function Menu()
    {
        return self::where([
            ["status" , "=" , 2]
        ])->parent();
    }

    /********************************
     * ******** #Static func ********
     ********************************/

}

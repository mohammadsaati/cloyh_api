<?php

namespace App\Models;

use App\Scope\ActiveScope;
use App\Scope\OrderScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
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

    public function items()
    {
        return $this->belongsToMany(Item::class , "item_sections" , "section_id" , "item_id");
    }

    public function images()
    {
        return $this->hasMany(SectionImages::class , "section_id");
    }
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

<?php

namespace App\Models;

use App\Filters\ItemFilter;
use App\Filters\ProductFilter;
use App\Scope\ActiveScope;
use App\Scope\OrderScope;
use App\Scope\StockScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
//        static::addGlobalScope( new ActiveScope("id" , [1]) );
        static::addGlobalScope( new OrderScope() );
        static::addGlobalScope( new StockScope() );
    }

    /**************************************
     * *********** #Relations *************
     **************************************/

    public function category()
    {
        return $this->belongsTo(Category::class , "category_id");
    }

    public function products()
    {
        return $this->hasMany(Product::class , "item_id");
    }

    public function vendors()
    {
        return $this->hasManyThrough(VendorProduct::class , Product::class , "item_id"  , "product_id");
    }

    /**************************************
     * *********** #Relations *************
     **************************************/


    /**************************************
     * *********** #Scope Fun *************
     **************************************/

    public function scopeFilter($query , ItemFilter $filter)
    {
        return $filter->apply($query);
    }

    public static function FindWithCategories($categories)
    {
        return self::query()->whereIn("category_id" , $categories);
    }

    /**************************************
     * *********** #Scope Fun *************
     **************************************/


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "shopping_cart_id"              ,       "product_id"         ,
        "count"
    ];

    public function cart()
    {
        return $this->belongsTo(ShoppingCart::class , "shopping_cart_id");
    }

    public function product()
    {
        return $this->belongsTo(Product::class , "product_id");
    }
}

<?php

namespace App\Scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class StockScope implements Scope
{
    private $relation;

    public function __construct($relation = "products")
    {
        $this->relation = $relation;
    }

    public function apply(Builder $builder, Model $model)
    {
        $builder->whereHas("$this->relation" , function ($query) {
            return $query->where("stock" , ">" , 0);
        });
    }
}

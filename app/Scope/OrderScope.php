<?php

namespace App\Scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrderScope implements Scope
{
    private $order_field;

    public function __construct($order_field = "id")
    {
        $this->order_field = $order_field;
    }

    public function apply(Builder $builder, Model $model)
    {
        $final_field = $model->getTable().".$this->order_field";

        return $builder->orderBy("$final_field" , "DESC");
    }
}

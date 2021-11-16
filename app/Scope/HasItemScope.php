<?php

namespace App\Scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class HasItemScope implements Scope
{
    private $relation_name;

    public function __construct($relation_name = "items")
    {
        $this->relation_name = $relation_name;
    }

    public function apply(Builder $builder, Model $model)
    {
        return $builder->has("$this->relation_name");
    }
}

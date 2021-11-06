<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class SingleFilter
{
    private $request;
    protected $model;

    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    public function apply($model)
    {
        $this->model = $model;

        foreach ( $this->filters() as $name => $value )
        {
            if ( method_exists($this , $name) && !empty($value) )
            {
                call_user_func_array( [$this , $name] , array_filter([$value]) );
            }
        }
        return $this->model;
    }

    protected function filters()
    {
        return $this->request->all();
    }

}

<?php

namespace App\Models;

use App\Scope\OrderScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope( new OrderScope() );
    }

    /****************************************************
     * **************** Extra  Func *********************
     ******************* Start **************************/

    public function checkDisCount() : int
    {
        if (!$this->discount)
            return (int) $this->after;

        if (!$this->off_dadline)
            return (int) $this->discount;

        $now_date = Carbon::now();
        $off_deadline = Carbon::parse($this->off_deadline);

        if ($now_date->greaterThan( $off_deadline ))
            return (int) $this->after;


        return (int) $this->discount;

    }

    /****************************************************
     * **************** Extra  Func *********************
     ******************** End ***************************/

}

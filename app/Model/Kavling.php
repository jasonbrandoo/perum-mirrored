<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kavling extends Model
{
    //
    protected $guarded = [];

    public function price()
    {
        return $this->belongsTo('App\Model\Price', 'kavling_price_id');
    }
}

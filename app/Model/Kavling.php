<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kavling extends Model
{
    //
    protected $guarded = [];

    // protected $dates = ['created_at', 'updated_at'];

    // protected $dateFormat = 'Y-m-d H:i';

    public function price()
    {
        return $this->belongsTo('App\Model\Price', 'kavling_price_id');
    }

    public function house()
    {
        return $this->belongsTo('App\Model\Rumah', 'kavling_type_id');
    }
}

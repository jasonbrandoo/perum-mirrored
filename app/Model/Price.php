<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected $guarded = [];

    public function house()
    {
        return $this->belongsTo('App\Model\Rumah', 'price_house_id');
    }
}

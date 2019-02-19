<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    //
    protected $guarded = [];

    protected $dates = ['price_start_date', 'price_end_date', 'created_at', 'updated_at'];

    public function house()
    {
        return $this->belongsTo('App\Model\Rumah', 'price_house_id');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //
    protected $guarded = [];

    public function spv()
    {
        return $this->belongsTo('App\Model\Sales', 'sales_spv');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $guarded = [];

    public function sales_executive()
    {
        return $this->belongsTo('App\Model\Sales', 'customer_executive_id');
    }

    public function sales_supervisor()
    {
        return $this->belongsTo('App\Model\Sales', 'customer_supervisor_id');
    }
}

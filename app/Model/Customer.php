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

    public function reference()
    {
        return $this->belongsTo('App\Model\Referensi', 'customer_reference_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'customer_office_id');
    }
}

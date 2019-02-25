<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mou extends Model
{
    //
    protected $guarded = [];

    protected $dates = ['mou_date', 'mou_start_date', 'mou_end_date'];
    
    public function companies()
    {
        return $this->belongsTo('App\Model\Company', 'mou_company_id');
    }
}

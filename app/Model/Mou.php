<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Mou extends Model
{
    //
    protected $guarded = [];
    
    public function companies()
    {
        return $this->belongsTo('App\Model\Company', 'mou_company_id');
    }
}

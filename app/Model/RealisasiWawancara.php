<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RealisasiWawancara extends Model
{
    //
    protected $guarded = [];

    public function wawancara()
    {
        return $this->belongsTo('App\Model\Wawancara', 'rlw_wawancara_id');
    }
}

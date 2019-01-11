<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pembatalan extends Model
{
    //
    protected $guarded = [];

    public function sp()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'cancel_sp_id');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pembatalan extends Model
{
    //
    protected $guarded = [];

    protected $dates = ['cancel_date'];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'cancel_sp_id');
    }

    public function makeBy()
    {
        return $this->belongsTo('App\User', 'cancel_make_by');
    }

    public function approveBy()
    {
        return $this->belongsTo('App\User', 'cancel_approve_by');
    }
}

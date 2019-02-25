<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    //
    protected $guarded = [];

    protected $dates = ['kwitansi_date', 'kwitansi_transfer_date'];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'kwitansi_sp_id');
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ajb extends Model
{
    //
    protected $guarded = [];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'ajb_sp_id');
    }
}

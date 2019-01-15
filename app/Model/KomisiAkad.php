<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KomisiAkad extends Model
{
    //
    protected $guarded = [];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'akad_sp_id');
    }
}

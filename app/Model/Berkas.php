<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    //
    protected $guarded = [];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'berkas_sp_id');
    }
}

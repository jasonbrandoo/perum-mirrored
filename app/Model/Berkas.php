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

    public function user()
    {
        return $this->belongsTo('App\User', 'berkas_reciever_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Model\Customer', 'berkas_giver_id');
    }
}

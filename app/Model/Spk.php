<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
    //
    protected $guarded = [];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'spk_sp_id');
    }
}

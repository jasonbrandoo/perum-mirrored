<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Spk extends Model
{
    //
    protected $guarded = [];

    protected $dates = ['spk_date'];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'spk_sp_id');
    }
}

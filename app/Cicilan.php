<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cicilan extends Model
{
    //
    protected $guarded = [];

    protected $table = 'cicilan';

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'cicilan_sp_id');
    }
}

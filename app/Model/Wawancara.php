<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    //
    protected $guarded = [];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'wawancara_sp_id');
    }
}

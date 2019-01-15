<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    //
    protected $guarded = [];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'legal_sp_id');
    }
}

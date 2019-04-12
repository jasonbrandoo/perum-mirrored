<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BiayaLain extends Model
{
    //
    protected $guarded = [];

    protected $table = 'biaya_lain';

    public function surat() {
        return $this->hasOne('App\Model\SuratPesanan', 'sp_id');
    }
}

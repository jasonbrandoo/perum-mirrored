<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiayaLain extends Model
{
    //

    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'biaya_lain';

    public function surat() {
        return $this->hasOne('App\Model\SuratPesanan', 'sp_id');
    }

    public function cicilan() {
        return $this->belongsTo('App\Model\SuratPesanan', 'sp_id');
    }
}

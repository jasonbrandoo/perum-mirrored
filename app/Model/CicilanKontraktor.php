<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CicilanKontraktor extends Model
{
    //
    use SoftDeletes;

    protected $guarded = [];

    protected $table = 'cicilan_kontraktor';

    protected $dates = ['deleted_at'];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'cicilan_sp_id');
    }
}

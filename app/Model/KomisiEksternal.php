<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KomisiEksternal extends Model
{
    //
    protected $guarded = [];

    protected $dates = ['eksternal_date', 'eksternal_ajb_date'];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'eksternal_sp_id');
    }

    public function mou()
    {
        return $this->belongsTo('App\Model\Mou', 'eksternal_mou_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'eksternal_company_id');
    }
}

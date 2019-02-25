<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    //
    protected $guarded = [];

    protected $dates = [
        'legal_date',
        'legal_shgb_date',
        'legal_shgb_parent_date',
        'legal_shgb_fraction_date',
        'legal_name_date',
        'legal_shm_date',
        'legal_imb_date',
        'legal_nop_pbb_date'
    ];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'legal_sp_id');
    }
}

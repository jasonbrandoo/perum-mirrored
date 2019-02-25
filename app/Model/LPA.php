<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LPA extends Model
{
    //
    protected $guarded = [];

    protected $table = 'l_p_as';

    protected $dates = ['lpa_date'];

    public function surat()
    {
        return $this->belongsTo('App\Model\SuratPesanan', 'lpa_sp_id');
    }
}

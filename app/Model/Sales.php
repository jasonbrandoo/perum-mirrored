<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //
    protected $guarded = [];

    protected $dates = ['sales_in', 'sales_out'];

    public function spv()
    {
        return $this->belongsTo('App\Model\Sales', 'sales_spv');
    }
    
    public function surat()
    {
        return $this->hasMany('App\Model\SuratPesanan', 'sp_se_id');
    }
}

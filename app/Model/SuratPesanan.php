<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SuratPesanan extends Model
{
    //
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo('App\Model\Customer', 'sp_customer_id');
    }

    public function sales()
    {
        return $this->belongsTo('App\Model\Sales', 'sp_se_id');
    }

    public function kavling()
    {
        return $this->belongsTo('App\Model\Kavling', 'sp_kavling_id');
    }
}

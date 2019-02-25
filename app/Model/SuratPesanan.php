<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SuratPesanan extends Model
{
    //
    protected $guarded = [];

    protected $dates = ['sp_date', 'sp_ppjb_date', 'created_at', 'update_at'];

    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'sp_company_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Model\Customer', 'sp_customer_id');
    }

    public function sales()
    {
        return $this->belongsTo('App\Model\Sales', 'sp_se_id');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Model\Sales', 'sp_spv_id');
    }

    public function kavling()
    {
        return $this->belongsTo('App\Model\Kavling', 'sp_kavling_id');
    }

    public function mou()
    {
        return $this->belongsTo('App\Model\Mou', 'sp_mou_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo('App\Model\Payment', 'sp_payment_method');
    }

    public function price()
    {
        return $this->belongsTo('App\Model\Price', 'sp_price_id');
    }
}

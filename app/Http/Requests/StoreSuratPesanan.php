<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuratPesanan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'sp_prebook' => ['required', 'numeric'],
            'sp_no' => ['required'],
            'sp_date' => ['required'],
            'sp_ppjb' => ['required'],
            'sp_ppjb_date' => ['required'],
            'sp_customer_id' => ['required'],
            'sp_customer_name' => ['required'],
            'sp_company_id' => ['required'],
            'sp_company_name' => ['required'],
            'sp_mou_id' => ['required'],
            'sp_koordinator' => ['required'],
            'sp_se_id' => ['required'],
            'sp_se_name' => ['required'],
            'sp_spv_id' => ['required'],
            'sp_kavling_id' => ['required'],
            'sp_house_type' => ['required'],
            'sp_house_block' => ['required'],
            'sp_house_no' => ['required'],
            'sp_house_cluster' => ['required'],
            'sp_house_building' => ['required'],
            'sp_house_surface' => ['required'],
            // 
            'sp_price_id' => ['required'],
            'sp_price' => ['required'],
            // 'sp_price_list' => ['required'],
            'sp_total_harga_jual' => ['required'],
            'sp_harga_jual_tanah' => ['required'],
            'sp_ppn_percentage' => ['required'],
            'sp_after_ppn' => ['required'],
            'sp_harga_tanah_bangunan' => ['required'],
            'sp_payment_method' => ['required'],
            'sp_harga_jual_pengikatan' => ['required'],
            'sp_kpr_plan' => ['required'],
            'sp_ajb_price' => ['required'],
            'sp_total' => ['required'],
            // 
            // 'sp_bill' => ['required'],
            'sp_dp' => ['required'],
            'sp_ppn' => ['required'],
            'sp_sub_total' => ['required'],
            'sp_total_bill' => ['required'],
            'sp_per_month_internal' => ['required'],
            'sp_internal_bill' => ['required'],
            'sp_per_month_kreditur' => ['required'],
            'sp_kreditur_bill' => ['required']
        ];
    }
}

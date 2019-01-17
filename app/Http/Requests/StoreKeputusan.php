<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKeputusan extends FormRequest
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
            'result_realization_id' => ['required'],
            'result_status' => ['required'],
            'result_banding' => ['required'],
            'result_date' => ['required'],
            'result_expired_date' => ['required'],
            'result_sp_id' => ['required'],
            'result_kpr_approve' => ['required', 'numeric'],
            'result_waktu_bunga' => ['required'],
            'result_angsuran_bulan' => ['required'],
            'result_account' => ['required' , 'numeric'],
            'result_angsuran_first_month' => ['required', 'numeric'],
            'result_provisi' => ['required'],
            'result_bi_notaris' => ['required'],
            'result_bi_apht' => ['required'],
            'result_appraiser' => ['required'],
            'result_premi_kebakaran' => ['required'],
            'result_premi_jiwa' => ['required'],
            'result_tabungan_diblokir' => ['required'],
            'result_bi_administrasi' => ['required'],
            'result_sub_total' => ['required'],
            'result_grand_total' => ['required'],
            'result_note' => ['required'],
        ];
    }
}

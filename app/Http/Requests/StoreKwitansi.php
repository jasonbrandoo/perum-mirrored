<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKwitansi extends FormRequest
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
            'kwitansi_date' => ['required'],
            'kwitansi_sp_id' => ['required'],
            'kwitansi_faktur' => ['required'],
            'kwitansi_reciever' => ['required'],
            'kwitansi_staff_name' => ['required'],
            'kwitansi_terbilang' => ['required'],
            'kwitansi_for_pay' => ['required'],
            'kwitansi_jumlah' => ['required'],
            'kwitansi_payment_method_id' => ['required'],
            'kwitansi_transfer_date' => ['required']
        ];
    }
}

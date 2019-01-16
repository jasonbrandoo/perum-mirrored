<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRealization extends FormRequest
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
            'realization_ajb_id' => ['required'],
            'realization_max_kpr' => ['required'],
            'realization_money_hold' => ['required'],
            'realization_imb' => ['required'],
            'realization_stf' => ['required'],
            'realization_listrik' => ['required'],
            'realization_bestek' => ['required'],
            'realization_prjb' => ['required'],
            'realization_prbj_2' => ['required'],
            'realization_stf_1' => ['required'],
            'realization_stf_date_1' => ['required'],
            'realization_stf_2' => ['required'],
            'realization_stf_2_date' => ['required'],
            'realization_kredit' => ['required'],
            'realization_application' => ['required'],
            'realization_npwp' => ['required'],
            'realization_nop' => ['required'],
        ];
    }
}

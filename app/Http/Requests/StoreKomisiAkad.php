<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKomisiAkad extends FormRequest
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
            'akad_date' => ['required'],
            'akad_sales_commision' => ['required'],
            'akad_spv_commision' => ['required'],
            'akad_coordinator' => ['required'],
            'akad_sp_id' => ['required'],
            'akad_ajb_date' => ['required'],
            'akad_company_id' => ['required']
        ];
    }
}

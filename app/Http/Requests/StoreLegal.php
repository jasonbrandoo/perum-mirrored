<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLegal extends FormRequest
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
            'legal_date' => ['required'],
            'legal_shgb_parent' => ['required'],
            'legal_shgb_parent_date' => ['required'],
            'legal_shgb_fraction' => ['required'],
            'legal_shgb_fraction_date' => ['required'],
            'legal_name' => ['required'],
            'legal_name_date' => ['required'],
            'legal_shm' => ['required'],
            'legal_shm_date' => ['required'],
            'legal_imb' => ['required'],
            'legal_imb_date' => ['required'],
            'legal_nop_pbb' => ['required'],
            'legal_nop_pbb_date' => ['required'],
            'legal_sp_id' => ['required']
        ];
    }
}

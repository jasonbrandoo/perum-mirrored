<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAjb extends FormRequest
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
            'ajb_date' => ['required'],
            'ajb_price_1' => ['required'],
            'ajb_price_2' => ['required'],
            'ajb_lt' => ['required'],
            'ajb_tl' => ['required'],
            'ajb_notaris' => ['required'],
            'ajb_sp_id' => ['required'],
            'ajb_shgb' => ['required'],
            'ajb_shgb_date' => ['required'],
            'ajb_imb' => ['required'],
            'ajb_imb_date' => ['required'],
            'ajb_sp3k' => ['required'],
            'ajb_sp3k_date' => ['required']
        ];
    }
}

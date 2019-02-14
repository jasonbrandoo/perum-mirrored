<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKavling extends FormRequest
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
            'kavling_type_id' => ['required'],
            'kavling_block' => ['required'],
            'kavling_number' => ['required'],
            'kavling_s_d' => ['required'],
            'kavling_cluster' => ['required'],
            'kavling_tl' => ['required'],
            'kavling_building' => ['required'],
            'kavling_surface' => ['required'],
            'kavling_tl_active' => ['required'],
            'kavling_tl_old' => ['required'],
            'kavling_price_id' => ['required', 'integer'],
            'kavling_price_selling' => ['required'],
            'kavling_price_tl_m2' => ['required'],
            'kavling_discount_dp' => ['required'],
            'kavling_sell_status' => ['required'],
            'kavling_build_status' => ['required'],
            'kavling_start_date' => ['required'],
            'kavling_progress' => ['required'],
            'kavling_end_date' => ['required'],
            'kavling_shgb' => ['required'],
            'kavling_shgb_date' => ['required'],
            'kavling_imb' => ['required'],
            'kavling_imb_date' => ['required']
        ];
    }
}

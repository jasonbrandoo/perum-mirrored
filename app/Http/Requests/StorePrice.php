<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrice extends FormRequest
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
            'price_id' => ['required', 'integer'],
            'price_start_date' => ['required'],
            'price_end_date' => ['required'],
            'price_house_id' => ['required', 'integer'],
            'price_house_type' => ['required', 'string'],
            'price_house_surface' => ['required', 'numeric'],
            'price_house_building' => ['required', 'numeric'],
            'price_selling' => ['required', 'numeric'],
            'price_discount' => ['required', 'numeric'],
            'price_ppn' => ['required', 'numeric'],
            'price_adm' => ['required', 'numeric'],
            'price_netto' => ['required', 'numeric'],
            'price_max_kpr' => ['required', 'numeric'],
            'price_dp' => ['required', 'numeric'],
            'price_discount_dp' => ['required', 'numeric'],
            'price_booking' => ['required', 'numeric'],
            'price_surface_m2' => ['required', 'numeric'],
            'price_notaris' => ['required', 'numeric'],
            'price_5_year' => ['required', 'numeric'],
            'price_10_year' => ['required', 'numeric'],
            'price_15_year' => ['required', 'numeric'],
            'price_20_year' => ['required', 'numeric'],
            'active' => ['required']
        ];
    }
}

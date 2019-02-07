<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Helpers\Validation;

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
            'price_start_date' => ['required'],
            'price_end_date' => ['required'],
            'price_house_id' => ['required', 'integer'],
            'price_house_type' => ['required', 'string'],
            'price_house_surface' => ['required', 'numeric'],
            'price_house_building' => ['required', 'numeric'],
            'price_selling' => ['required'],
            'price_discount' => ['required'],
            'price_ppn' => ['required'],
            'price_adm' => ['required'],
            'price_netto' => ['required'],
            'price_max_kpr' => ['required'],
            'price_dp' => ['required'],
            'price_discount_dp' => ['required'],
            'price_booking' => ['required'],
            'price_surface_m2' => ['required'],
            'price_notaris' => ['required'],
            'price_5_year' => ['required'],
            'price_10_year' => ['required'],
            'price_15_year' => ['required'],
            'price_20_year' => ['required'],
        ];
    }
}

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
            'price_selling' => ['required', Validation::cheker()],
            'price_discount' => ['required', Validation::cheker()],
            'price_ppn' => ['required', Validation::cheker()],
            'price_adm' => ['required', Validation::cheker()],
            'price_netto' => ['required', Validation::cheker()],
            'price_max_kpr' => ['required', Validation::cheker()],
            'price_dp' => ['required', Validation::cheker()],
            'price_discount_dp' => ['required', Validation::cheker()],
            'price_booking' => ['required', Validation::cheker()],
            'price_surface_m2' => ['required', Validation::cheker()],
            'price_notaris' => ['required', Validation::cheker()],
            'price_5_year' => ['required', Validation::cheker()],
            'price_10_year' => ['required', Validation::cheker()],
            'price_15_year' => ['required', Validation::cheker()],
            'price_20_year' => ['required', Validation::cheker()],
        ];
    }
}

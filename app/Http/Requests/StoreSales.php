<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSales extends FormRequest
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
            'sales_name' => ['required', 'string'],
            'sales_mobile_number' => ['required', 'numeric'],
            'sales_number' => ['required', 'numeric'],
            'sales_no_ktp' => ['required', 'numeric'],
            'sales_address' => ['required'],
            'sales_city' => ['required'],
            'sales_province' => ['required'],
            'sales_zipcode' => ['required', 'numeric'],
            'sales_position' => ['required'],
            'sales_target' => ['required'],
            'sales_in' => ['required'],
            'active' => ['required']
        ];
    }
}

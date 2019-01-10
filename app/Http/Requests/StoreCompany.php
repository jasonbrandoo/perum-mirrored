<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
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
            'company_name' => ['required', 'string'],
            'company_type' => ['required'],
            'company_address' => ['required'],
            'company_city' => ['required', 'string'],
            'company_province' => ['required', 'string'],
            'company_zipcode' => ['required', 'numeric'],
            'company_state' => ['required', 'string'],
            'company_phone' => ['required', 'numeric'],
            'company_email' => ['required', 'email']
        ];
    }
}

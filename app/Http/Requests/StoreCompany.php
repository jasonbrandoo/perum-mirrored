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
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'company_name.required' => 'Company name is required',
            'company_type.required' => 'Company type is required',
            'company_address.required' => 'Company address is required',
            'company_city.required' => 'Company city is required',
            'company_province.required' => 'Company province is required',
            'company_zipcode.required' => 'Company zipcode is required',
            'company_state.required' => 'Company state is required',
            'company_phone.required' => 'Company phone name is required',
            'company_email.required' => 'Company email is required'
        ];
    }
}

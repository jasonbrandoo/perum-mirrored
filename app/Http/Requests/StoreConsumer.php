<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsumer extends FormRequest
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
            'customer_name' => ['required', 'string'],
            'customer_ktp' => ['required', 'numeric'],
            'customer_ktp_expired' => ['required'],
            'customer_ktp_address' => ['required'],
            'customer_city' => ['required'],
            'customer_zipcode' => ['required', 'numeric'],
            'customer_current_address' => ['required'],
            'customer_current_city' => ['required'],
            'customer_current_zipcode' => ['required', 'numeric'],
            'customer_telp' => ['required', 'numeric'],
            'customer_mobile_number' => ['required', 'numeric'],
            'customer_house_status' => ['required'],
            'customer_length_of_stay' => ['required'],
            'customer_birth_place' => ['required'],
            'customer_birthdate' => ['required'],
            'customer_maternal_status' => ['required'],
            'customer_tanggungan' => ['required'],
            'customer_npwp' => ['required', 'numeric'],
            'customer_religion' => ['required'],
            'customer_gender' => ['required'],
            'customer_mother' => ['required'],
            'customer_address_mail' => ['required'],
            'customer_reference_id' => ['required'],
            'customer_executive_id' => ['required'],
            'customer_supervisor_id' => ['required'],
            'customer_job_name' => ['required'],
            'customer_nip' => ['required', 'numeric'],
            'customer_job_title' => ['required'],
            'customer_job_duration' => ['required'],
            'customer_office_id' => ['required'],
            'customer_office_address' => ['required'],
            'customer_office_city' => ['required'],
            'customer_office_zipcode' => ['required', 'numeric'],
            'customer_office_phone' => ['required', 'numeric'],
            'customer_office_fax' => ['required', 'numeric'],
            'customer_office_email' => ['required'],
            'customer_income' => ['required', 'numeric'],
            'customer_additional_income' => ['required', 'numeric'],
            'customer_family_income' => ['required', 'numeric'],
            'customer_total_income' => ['required', 'numeric'],
            'customer_routine_expenses' => ['required', 'numeric'],
            'customer_residual_income' => ['required', 'numeric'],
            'customer_installment_ability' => ['required', 'numeric'],
        ];
    }
}
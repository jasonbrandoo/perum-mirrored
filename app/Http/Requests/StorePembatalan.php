<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembatalan extends FormRequest
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
            'cancel_date' => ['required'],
            'cancel_group' => ['required'],
            'cancel_reason' => ['required'],
            'cancel_status' => ['required'],
            'cancel_sp_id' => ['required'],
            'cancel_consumen_bill' => ['required'],
            'cancel_total_bill' => ['required'],
            'cancel_make_by' => ['required'],
            'cancel_approve_by' => ['required'],

        ];
    }
}

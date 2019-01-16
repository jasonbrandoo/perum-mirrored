<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLpa extends FormRequest
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
            'lpa_date' => ['required'],
            'lpa_type' => ['required'],
            'lpa_kavling_id' => ['required'],
            'lpa_sp_id' => ['required']
        ];
    }
}
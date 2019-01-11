<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWawancara extends FormRequest
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
            'wawancara_date' => ['required'],
            'wawancara_price' => ['required'],
            'wawancara_kpr' => ['required'],
            'wawancara_analyst' => ['required'],
            'wawancara_status' => ['required'],
            'wawancara_sp_id' => ['required'],
            'wawancara_kreditur_id' => ['required'],
            'wawancara_kreditur_name' => ['required']
        ];
    }
}

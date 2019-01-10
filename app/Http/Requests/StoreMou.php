<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMou extends FormRequest
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
            'mou_company_id' => ['required'],
            'mou_coordinator' => ['required'],
            'mou_coordinator_position' => ['required'],
            'mou_active' => ['required'],
            'mou_date' => ['required', 'string'],
            'mou_start_date' => ['required'],
            'mou_end_date' => ['required'],
            'mou_commision' => ['required', 'numeric']
        ];
    }
}

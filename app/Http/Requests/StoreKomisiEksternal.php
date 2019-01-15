<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKomisiEksternal extends FormRequest
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
            'eksternal_date' => ['required'],
            'eksternal_coordiantor' => ['required'],
            'eksternal_commision' => ['required'],
            'eksternal_company_id' => ['required'],
            'eksternal_mou_id' => ['required'],
            'eksternal_sp_id' => ['required'],
            'eksternal_ajb_date' => ['required'],
            
        ];
    }
}

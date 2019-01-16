<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBerkas extends FormRequest
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
            'berkas_date' => ['required'],
            'berkas_giver' => ['required'],
            'berkas_reciever' => ['required'],
            'berkas_sp_id' => ['required']
        ];
    }
}
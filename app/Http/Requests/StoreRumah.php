<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRumah extends FormRequest
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
            'rumah_id' => ['required', 'integer'],
            'rumah_type_name' => ['required', 'string'],
            'surface_area' => ['required', 'numeric'],
            'building_area' => ['required', 'numeric'],
            'active' => ['required']
        ];
    }
}

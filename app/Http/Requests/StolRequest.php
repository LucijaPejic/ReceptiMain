<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StolRequest extends FormRequest
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
            'naziv' => 'required|string|max:100',
            'broj_gostiju' => 'required|numeric',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'naziv.required' => 'Unesite naziv!',
            'broj_gostiju.required' => 'Unesite broj gostiju!',
            'status.required' => 'Odaberite status!',

            'broj_gostiju.numeric' => 'Nevažeći unos',
        ];
    }
}

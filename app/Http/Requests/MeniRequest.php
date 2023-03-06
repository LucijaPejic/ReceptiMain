<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeniRequest extends FormRequest
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
            'opis' => 'required|string|max:100',
            'slika' => 'required',
            'cijena' => 'required|numeric',

        ];
    }

    public function messages()
    {
        return [
            'naziv.required' => 'Unesite naziv!',
            'opis.required' => 'Unesite opis!',
            'slika.required' => 'Odaberite sliku!',
            'cijena.required' => 'Unesite cijenu!',

            'naziv.string' => 'Nevažeći unos',
            'opis.string' => 'Nevažeći unos',
            'cijena.numeric' => 'Nevažeći unos',

        ];
    }
}

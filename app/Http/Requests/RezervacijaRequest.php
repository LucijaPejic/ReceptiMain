<?php

namespace App\Http\Requests;

use App\Models\Stol;
use Illuminate\Foundation\Http\FormRequest;

class RezervacijaRequest extends FormRequest
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
            'ime' => 'required|string|max:100',
            'prezime' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'broj_telefona' => 'required|numeric',
            'datum_rezervacije' => 'required',
            'broj_gostiju' => 'required|numeric',
            'stol_id' => 'required'
        ];
    }

    public function withValidator($validator)
    {

        $validator->after(function ($validator) {
            $stol = Stol::find($this->stol_id);

            if ($stol && $this->input('broj_gostiju') > $stol->broj_gostiju) {
                $validator->errors()->add('stol_id', 'Ovaj stol nema toliko mjesta! Molimo izaberite drugi stol.');
            }
        });
        $validator->validate();
    }

    public function messages()
    {
        return [
            'ime.required' => 'Unesite ime!',
            'prezime.required' => 'Unesite prezime!',
            'email.required' => 'Unesite email adresu!',
            'broj_telefona.required' => 'Unesite broj telefona!',
            'datum_rezervacije.required' => 'Unesite datum i vrijeme rezervacije!',
            'broj_gostiju.required' => 'Unesite broj gostiju!',
            'stol_id.required' => 'Odaberite stol!',

            'broj_telefona.numeric' => 'Nevažeći unos',
            'broj_gostiju.numeric' => 'Nevažeći unos',

            'email.email' => 'Unesite točnu email adresu!',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTrackRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'numer_kierowcy' => 'required|unique:tracks,numer_kierowcy|numeric',
            'sluzba' => 'required',
            'godz_pracy' => 'required',
            'nr_pojazdu' => 'required|numeric'
        ];
    }
}

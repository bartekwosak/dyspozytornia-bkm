<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
{
    function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'numer_sluzbowy' => 'required|numeric',
            'imie_kierowcy' => 'required',
            'nazwisko_kierowcy' => 'required',
            'grupa_stanowisko' => 'required',
            'dni_pracy' => 'required',
            'stalka' => 'required'
        ];
    }
}

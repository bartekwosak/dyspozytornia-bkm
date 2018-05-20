<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrigadeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'numer_brygady'=>'required',
            'rodzaj_dnia'=>'required',
            'godziny'=>'required',
            'miejsce_zmiany' => 'required',
            'przydzial' => 'required',
            'spolka' => 'required'
        ];
    }
}

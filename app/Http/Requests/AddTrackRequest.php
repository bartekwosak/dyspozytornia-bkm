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
            'nr_pojazdu' => 'required|numeric',
            'driver_id' =>'required',
            'brigade_id' => 'required'
        ];
    }
}

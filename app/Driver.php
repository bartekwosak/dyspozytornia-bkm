<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Driver extends Model
{
    use Sortable;

    protected $fillable = [
        'numer_sluzbowy',
        'imie_kierowcy',
        'nazwisko_kierowcy',
        'etat',
        'dni_pracy',
        'stalka'
    ];

    public $sortable = [
        'numer_sluzbowy',
        'imie_kierowcy',
        'nazwisko_kierowcy',
        'etat',
        'dni_pracy',
        'stalka'
    ];
}

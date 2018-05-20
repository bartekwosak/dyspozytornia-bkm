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
        'dni_pracy',
        'stalka',
        'grupa_stanowisko'
    ];

    public $sortable = [
        'numer_sluzbowy',
        'imie_kierowcy',
        'nazwisko_kierowcy',
        'dni_pracy',
        'stalka'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tracks()
    {
        return $this->hasMany('App\Track');
    }
}

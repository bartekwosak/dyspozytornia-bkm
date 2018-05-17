<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Brigade extends Model
{
    use Sortable;

    protected $fillable = [
        'numer_brygady',
        'godziny',
        'rodzaj_dnia',
        'miejsce_zmiany',
        'spolka',
        'przydzial'
    ];

    public $sortable = [
        'numer_brygady',
        'godziny',
        'rodzaj_dnia',
        'miejsce_zmiany',
        'spolka',
        'przydzial'
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

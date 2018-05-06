<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Track extends Model
{
    use Sortable;

    protected $fillable = [
        'numer_kierowcy',
        'sluzba',
        'godz_pracy',
        'nr_pojazdu'
    ];

    public $sortable = [
        'numer_kierowcy',
        'sluzba',
        'godz_pracy',
        'nr_pojazdu',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}

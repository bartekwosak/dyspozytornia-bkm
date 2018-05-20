<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Track extends Model
{
    use Sortable;

    protected $fillable = [
        'numer_kierowcy',
        'id_dnia',
        'brigade_id',
        'user_id',
        'driver_id',
        'godz_pracy',
        'nr_pojazdu'
    ];

    public $sortable = [
        'numer_kierowcy',
        'brigade_id',
        'godz_pracy',
        'nr_pojazdu',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function brigade()
    {
        return $this->belongsTo('App\Brigade');
    }

    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }


}

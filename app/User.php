<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tracks()
    {
        return $this->hasMany('App\Track');
    }

    public function brigades()
    {
        return $this->hasMany('App\Brigade');
    }

    public function drivers()
    {
        return $this->hasMany('App\Driver');
    }
}

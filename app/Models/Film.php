<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Film extends Model
{
    //
    protected $table = 'films';

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_has_film', 'film_id', 'role_id');
    }

    public function event()
    {
        return $this->hasOne(Event::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table = 'roles';

    public function film() {
        $this->belongsToMany('Film', 'role_has_film', 'role_id', 'film_id');
    }
}

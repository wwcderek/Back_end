<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Film extends Model
{
    //
    protected $table = 'films';

    public function role() {
        return $this->belongsToMany('Role', 'role_has_film', 'film_id', 'role_id');
    }
}

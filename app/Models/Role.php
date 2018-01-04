<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Film;

class Role extends Model
{
    //
    protected $table = 'roles';
    public $timestamps = false;

    public function film() {
       return $this->belongsToMany(\App\Models\Film::class, 'role_has_film', 'role_id', 'film_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Film extends Model
{
    //
    protected $table = 'films';

    protected $fillable = [
        'title', 'language', 'description', 'running_time', 'publish_time', 'rating'
    ];
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_has_film', 'film_id', 'role_id');
    }
}

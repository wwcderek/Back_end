<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $table = 'events';
    public $timestamps = false;

//    public function film(){
//       return $this->hasOne(Film::class);
//    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}

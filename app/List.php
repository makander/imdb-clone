<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User')
    }
    
    public function movieList()
    {
        return $this->hasMany('App\MovieList')
    }

    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieList extends Model
{
    public function list()
    {
        return $this->belongsTo('App\List');
    }
}

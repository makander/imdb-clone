<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    public function movie()
    {
        return $this->belongTo('App\Movie');
    }
    

    protected $fillable = [
        'castId', 
        'character', 
        'gender',
        'movieId',
        'name',
        'order',
        'profilePath'
        
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    

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

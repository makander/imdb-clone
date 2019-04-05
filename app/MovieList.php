<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieList extends Model
{
    public $timestamps = false;
    
    public function list()
    {
        return $this->belongsTo('App\List');

    }

    protected $fillable = [
        'list_id',
        'movie_id',
        'movie_title',
        'movie_pic'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function movie()
    // {
    //     return $this->belongsTo('App\Movie');
    // }


    protected $fillable = [
        'movie_id',
        'author',
        'content',
        'review_id',
        'review_rating'
    ];
}

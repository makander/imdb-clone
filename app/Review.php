<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'movieId',
        'author',
        'content',
        'reviewId',
        'reviewRating'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'movie_id',
        'content',
        'review_rating',
        'author_id',
        'nickName',
        'approved'
    ];
}

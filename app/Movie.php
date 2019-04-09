<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function cast()
    {
        return $this->hasOne('App\Cast');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    protected $fillable = [
    "movie_id",
    "voteCount",
    "voteAverage",
    "title",
    "popularity",
    "posterPath",
    "originalLanguage",
    "originalTitle",
    "genreId",
    "backdropPath",
    "pgRating",
    "overview",
    "releaseDate"
    ];
}

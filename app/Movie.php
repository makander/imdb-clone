<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    protected $fillable = [
    "movieId",
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

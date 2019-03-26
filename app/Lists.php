<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function movieList()
    {
        return $this->hasMany('App\MovieList');
    }

    protected $fillable = [
        'list_name', 'list_owner'
    ];
}

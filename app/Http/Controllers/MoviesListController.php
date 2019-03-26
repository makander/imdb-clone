<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MovieList;
use App\Lists;

class MoviesListController extends Controller
{
    public function show()
    {
        $table = MovieList::all();
        var_dump($table);
        // return view('movielist')->with('movieList', $table);

        // $movieList = MovieList::where("id", "=", $listId)->get();
    }
}

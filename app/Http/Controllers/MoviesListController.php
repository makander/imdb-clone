<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MovieList;
use App\Lists;

class MoviesListController extends Controller
{
    public function show($id)
    {
        $tables = MovieList::where("id", "=", $id)->get();
        return view('movielist', ['tables' => $tables]);

    }

    public function store()
    {
        
    }
}

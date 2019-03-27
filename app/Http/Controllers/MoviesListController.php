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

    public function delete(Request $request, $id)
    {
        dd($request, $id);
        $movieToRemove = MovieList::where("movie_id", "=", $movie_id)
            ->where("id", '=', $id);
        // $movieToRemove = MovieList::find($movie_id);
        $movieToRemove->delete();

        return redirect()->action('MoviesListController@show');
    }
}

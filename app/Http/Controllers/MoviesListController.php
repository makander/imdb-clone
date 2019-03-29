<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\MovieList;
use App\Lists;

class MoviesListController extends Controller
{
    public function show($list_id)
    {
        // dd($list_id);
        $tables = MovieList::where("list_id", "=", $list_id)->get();
        return view('movielist', ['tables' => $tables]);

    }

    public function store()
    {
        $userId = auth()->user()->id;
        $myWatchlists = Lists::where("list_owner", "=", $userId)->get();
        
        
    }

    public function delete($id)
    {
        $movieToRemove = MovieList::find($id);
        $movieToRemove->delete();

        return redirect()->action('MoviesListController@show', [$movieToRemove->list_id]);
    }
}

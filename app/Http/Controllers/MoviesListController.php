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
        if (auth()->user()) {
            $tables = MovieList::where("list_id", "=", $list_id)->get();
            return view('movielist', ['tables' => $tables]);
        } else {
            return redirect('login');
        }
    }

    public function store(Request $request, $id)
    {
        if ($request->input('list_id') && $id) {
            $data['list_id'] = $request->input('list_id');
            $data['movie_id'] = $id;
            $data['movie_title'] = $request->input('movie_title');
            $data['movie_pic'] = $request->input('movie_pic');
            MovieList::create($data);
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $movieToRemove = MovieList::find($id);
        $movieToRemove->delete();

        return redirect()->action('MoviesListController@show', [$movieToRemove->list_id]);
    }
}

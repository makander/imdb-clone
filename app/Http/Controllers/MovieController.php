<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MovieController extends Controller
{
    public function index()
    {
        $movies = ["Titanic", "Lion King", "X-men"];

        return view('movies', compact('movies'));
    }
}

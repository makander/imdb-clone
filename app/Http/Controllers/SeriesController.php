<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SeriesController extends Controller
{
    public function index()
    {
        $series = ["Sopranos", "Better call Saul", "South Park"];

        return view('series', compact('series'));
    }
}

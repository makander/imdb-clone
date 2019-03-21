<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CastController extends Controller
{
    public function index()
    {
        $cast = ['Nicole Kidman', 'Quintin Tarantino', 'Allan Rickman'];

        return view('cast', compact('cast'));
    }
}

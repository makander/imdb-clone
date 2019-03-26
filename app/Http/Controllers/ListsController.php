<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lists;

class ListsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $id = auth()->user()->id;
        $lists = \App\Lists::all();
        return view('lists')->with('lists', $lists);
    }



    /*     public function index()
        {
            return view('lists');
        } */
}

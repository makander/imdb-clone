<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lists;
use App\User;

class ListsController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function show()
    {
        $userId = auth()->user()->id;
        $lists = Lists::where("list_owner", "=", $userId)->get();
        return view('lists')->with('lists', $lists);
    }

    public function store(Request $request)
    {
        $data['list_name'] = $request->input('list_name');
        $data['list_owner'] = auth()->user()->id;
        Lists::create($data);
        return redirect()->action('ListsController@show');
    }

    /*     public function index()
        {
            return view('lists');
        } */
}

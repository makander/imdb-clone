<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function index(Request $request)
    {

        $users = User::all();

        return view('/admin', compact('users'));
    }


    
}

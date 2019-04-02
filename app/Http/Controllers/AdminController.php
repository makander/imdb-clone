<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('/admin', compact('users'));
        
    }

    public function delete($id)
    {
        
        $deleteUser = User::find($id);
        $deleteUser->delete();
        
        return redirect('/admin');
    }
    
}

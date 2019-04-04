<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Review;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::all();
        $reviews = Review::all()->where('approved', 0);

        return view('/admin', compact('users','reviews'));
        
    }

    public function edit(Request $request, $id) 
    {

        $editUser = User::find($id);
        $editUser->firstName = $request->input('firstName');
        $editUser->lastName = $request->input('lastName');
        $editUser->email = $request->input('email');
        $editUser->save();

        return redirect()->back();
    }

    public function update($id)
    {
        $approveReview = Review::find($id)->update(['approved' => 1]);

        return redirect()->action('AdminController@index');
    }

    public function delete($id)
    {
        $deleteUser = User::find($id);
        $deleteUser->delete();
        
        return redirect()->action('AdminController@index');
    }

    public function deleteReview($id)
    {
        $deleteReview = Review::find($id);
        $deleteReview->delete();
        
        return redirect()->action('AdminController@index');
    }
    
    
}

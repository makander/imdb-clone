<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{


    public function store(Request $request, $id)
    {
        $data['content'] = $request->input('content');
        $data['movie_id'] = $id;
        $data['author_id'] = auth()->user()->id;
        $data['nickName'] = $request->input('nickName');
        Review::create($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $commentToRemove = Review::find($id);
        $commentToRemove->delete();
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $commentToUpdate = Review::find($id);
        $commentToUpdate->content = $request->input('content');
        $commentToUpdate->save();
        return redirect()->back();
    }
}

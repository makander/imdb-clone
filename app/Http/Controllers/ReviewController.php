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
        Review::create($data);
        return redirect()->action('MovieController@show');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreList;
use App\Http\Requests\UpdateList;
use App\Lists;
use App\User;
use App\MovieList;

class ListsController extends Controller
{
    public function show()
    {
        if (auth()->user()) {
            $movieImageArray = [];
            $userId = auth()->user()->id;
            $lists = Lists::where("list_owner", "=", $userId)->get();
            foreach ($lists as $list) {
                $moviesInList = MovieList::where("list_id", "=", $list->id)->first();
                if ($moviesInList) {
                    array_push($movieImageArray, $moviesInList->movie_pic);
                }
            }
            // dd($moviesInList);
            // dd($movieImageArray);
            return view(
                'lists',
                [
                'lists' => $lists,
                'movieImageArray' => $movieImageArray
                ]
            );
        } else {
            return redirect('login');
        }
    }

    public function store(StoreList $request)
    {
        $data['list_name'] = $request->input('list_name');
        $data['list_owner'] = auth()->user()->id;
        Lists::create($data);
        return redirect()->action('ListsController@show');
    }

    public function destroy($id)
    {
        $listToRemove = Lists::find($id);
        $listToRemove->delete();
        return redirect()->action('ListsController@show');
    }

    public function update(UpdateList $request, $id)
    {
        $listToUpdate = Lists::find($id);
        $listToUpdate->list_name = $request->input('updated_name');
        $listToUpdate->save();
        return redirect()->action('ListsController@show');
    }
}

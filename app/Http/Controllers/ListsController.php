<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreList;
use App\Http\Requests\UpdateList;
use App\Lists;
use App\User;

class ListsController extends Controller
{
    public function show()
    {
        $userId = auth()->user()->id;
        $lists = Lists::where("list_owner", "=", $userId)->get();
        return view('lists')->with('lists', $lists);
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

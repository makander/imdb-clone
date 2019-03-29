@extends('layouts.app')
@section('content')

<div>
    <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$details->poster_path}}">
        <h1>{{$details->title}}</h1>
    <p> {{$details->overview}} </p>
</div>

<div>
    <form method="POST" action="/lists" placeholder="Dead Link">
        @csrf
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add to Watchlist
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </div>

        <input type="text" name="list_name" />

        <button type="submit">
            Add to movie list
        </button>
    </form>
</div>

@endsection
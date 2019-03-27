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

        <input type="text" name="list_name" />

        <button type="submit">
            Add to movie list
        </button>
    </form>
</div>

@endsection
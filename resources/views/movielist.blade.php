@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/movielist.css') }}">


<div class="row justify-content-center p-4">
    @foreach ($tables as $table)
    <div class="card m-3 pb-4 shadow" style="width: 14rem;">
        <a href="/movies/{{ $table->movie_id}}">
            <img class="card-img-top" src="http://image.tmdb.org/t/p/w400//{{$table->movie_pic}}" alt="">
        </a>
        
        <div class="card-body">
            <p class="card-text">
                <a href="../movies/{{$table->movie_id}}"> {{$table->movie_title}}</a>
            </p>
        </div>
        <form method="POST" action="{{ route('movielist.delete', [$table->id])}}"> {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-outline-danger" type="submit">
                <a>Delete</a></button>
        </form>
    </div>
    @endforeach
</div>
@endsection
@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


<div class="pb-3">
    <div id="carousel" class="carousel slide d-none d-md-block d-xl-non" data-ride="carousel">
        <div class="carousel-item active">
            <div id="carousel-1" style="
        background-image: url('https://image.tmdb.org/t/p/original/{{$movies[1]->backdrop_path}}');">
            </div>
        </div>
        <div class="carousel-item">
            <div class="media">
                <div id="carousel-2" style="
        background-image: url('https://image.tmdb.org/t/p/original/{{$movies[0]->backdrop_path}}');
        "></div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="media">
                <div id="carousel-2" style="
        background-image: url('https://image.tmdb.org/t/p/original/{{$movies[2]->backdrop_path}}');">
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">

        @foreach ($movies as $match)
        <div class="card ml-5 mt-3 shadow" style="width: 18rem;">
            <a href="/movies/{{$match->id}}">
                <img class="card-img-top" src="http://image.tmdb.org/t/p/w500//{{$match->poster_path}}"
                    alt="Card image cap">
            </a>
            <div class="card-body text-center">
                <h5 class="card-title">
                    <a href="/movies/{{ $match->id}}">
                        <b>{{ $match->title }}</b> </h5></a>
                <p>({{ $match->release_date }})
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
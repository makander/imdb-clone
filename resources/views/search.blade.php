@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


<div>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-item active">
            <div style="
        background-image: url('https://image.tmdb.org/t/p/original/{{$movies[1]->backdrop_path}}');
        height:60vh;
        width:100vw;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;"></div>
        </div>
        <div class="carousel-item">
            <div class="media" style="display:flex;flex-direction:column;">
                <div style="
        background-image: url('https://image.tmdb.org/t/p/original/{{$movies[0]->backdrop_path}}');
        height:60vh;
        width:100vw;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;"></div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="media" style="display:flex;flex-direction:column;">
                <div style="
        background-image: url('https://image.tmdb.org/t/p/original/{{$movies[2]->backdrop_path}}');
        height:60vh;
        width:100vw;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;"></div>
            </div>
        </div>
    </div>




    <div class="row justify-content-center">

        @foreach ($movies as $match)
        @if($match->poster_path)
        <div class="card p-2 m-2 text-center shadow" style="width: 16rem;">
            <img class=" card-img-top" src="http://image.tmdb.org/t/p/w500//{{$match->poster_path}}"
                alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="/movies/{{ $match->id}}">
                        <b>{{ $match->title }}</b> </h5>
                <p>({{ $match->release_date }})</a>
                </p>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
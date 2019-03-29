@extends('layouts.app')
@section('content')

<div class="main">
    <div class="jumbotron">
        <div class="container bg-light rounded p-5">
            <p>
                Search for a movie! 
            </p>
            <div class="form-inline">
                <input class="form-control mr-sm-2" id="searchField" type="search" placeholder="Search movies" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="searchMovie()" type="submit">Search</button>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($movies as $match)
        <div class="card ml-5 mt-3" style="width: 18rem;">
            <img class="card-img-top" src="http://image.tmdb.org/t/p/w500//{{$match->poster_path}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">
                    <a href="/movies/{{ $match->id}}" style="text-decoration:none;color:black">
                        <b>{{ $match->title }}</b> ({{ $match->release_date }})</a>
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>

function searchMovie() {
    console.log("hello");
    let query = document.querySelector('#searchField').value;
    window.location.replace(`http://dimb.test/movies/search/${query}`);
}

</script>
@endsection 
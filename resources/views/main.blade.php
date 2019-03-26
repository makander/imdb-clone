@extends('layouts.app')
@section('content')

    <div class="main">
        <div class="jumbotron">
            <div class="container bg-light rounded p-5">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsa omnis corporis odit vel iste harum! Libero, officia quisquam voluptates quam tempore officiis nam? Nemo consequatur amet reiciendis harum rem inventore.
                </p>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" id="searchField" type="search" placeholder="Search movies" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" onclick="searchMovie()" type="submit">Search</button>
                </form>
            </div>
        </div>


        @foreach ($movies as $match)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="http://image.tmdb.org/t/p/w45//{{$match->poster_path}}" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">
                    <a href="/movies/{{ $match->id}}" style="text-decoration:none;color:black">
                        <b>{{ $match->title }}</b> ({{ $match->release_date }})</a>
                </p>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>

@endsection


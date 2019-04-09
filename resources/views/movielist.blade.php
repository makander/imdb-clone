@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/movielist.css') }}">

<div class="container xcontainer">
    @foreach ($tables as $table)
    <div class="card ml-5 mt-3" style="width: 14rem;">
        <img class="card-img-top" src="http://image.tmdb.org/t/p/w400//{{$table->movie_pic}}" alt="">
        <div class="card-body">
            <p class="card-text">
                <a href="../movies/{{$table->movie_id}}"> {{$table->movie_title}}</a>
            </p>
        </div>
        <form method="POST" action="{{ route('movielist.delete', [$table->id])}}"> {{ csrf_field() }}
            {{ method_field('DELETE') }} <button type="submit">
                <a>Delete</a></button>
        </form>
    </div>
    @endforeach
</div>


</div>
</div>
<script>
</script>
@endsection
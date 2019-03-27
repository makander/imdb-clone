@extends('layouts.app')
@section('content')

this is the list of movies in your list

@foreach ($tables as $table)
<a href=""> {{$table->movie_title}}</a>
        <form method="POST" action="{{ route('movielist.delete', [$table->movie_id, $table->id])}}"> {{ csrf_field() }}
            {{ method_field('DELETE') }} <button type="submit">
                Delete</button>
        </form>

    <!-- <li>{{ $table->movie_title }}</li> -->

@endforeach

@endsection
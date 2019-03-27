@extends('layouts.app')
@section('content')

this is the list of movies in your list

@foreach ($tables as $table)

    <li>{{ $table->movie_title }}</li>

@endforeach

@endsection
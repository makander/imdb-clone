@extends('layouts.app')
@section('content')

<div>
    <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$details->poster_path}}">
    <h1>{{$details->title}}</h1>
    <p> {{$details->overview}} </p>
</div>

@if(auth()->user())
<div>        
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Add to Watchlist
        </button>
        <form method="POST" action="{{ route('movielist.store', [$details->id])}}">
        @csrf
            <input type="hidden" name="movie_title" value="{{ $details->title }}">
            <input type="hidden" name="movie_pic" value="{{ $details->poster_path }}">

            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($watchlists as $watchlist)
                    <a class="dropdown-item" href="#"> {{ $watchlist->list_name }}</a>
                    <input type="hidden" name="list_id" value="{{ $watchlist->id }}">
                @endforeach
            </div>
            <button type="submit">Add</button>
        </form>
    </div>
    <form method="POST" action="/movies/{{$details->id}}/review" placeholder="Dead Link">
        @csrf
        <input type="hidden" name="nickName" value="{{ auth()->user()->nickName }}">

        <textarea name="content" rows="4" cols="50" /></textarea>
        <button type="submit">Submit</button>
    </form>
</div>
@endif

<ul>
    @foreach ($reviews as $review)
    <li>
       <p> User:   {{$review->nickName}} </p>
        <p> Review: {{$review->content}} </p>

        @if(auth()->user() == true && auth()->user()->id == $review->author_id)
        <form method="POST" action="{{ route('review.destroy', [$review->id])}}">
            {{ csrf_field() }} {{ method_field('DELETE') }} <button type="submit">
                Delete</button>
        </form>

        <form method="GET" action="{{ route('review.update', [$review->id])}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <textarea name="content" rows="4" cols="50" /></textarea>
            <button type="submit">Edit</button>
        </form>

        @endif
    </li>
    @endforeach
</ul>

@endsection
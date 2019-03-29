@extends('layouts.app')
@section('content')

<div>
    <img src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$details->poster_path}}">
    <h1>{{$details->title}}</h1>
    <p> {{$details->overview}} </p>
</div>

@if(auth()->user());
<div>
    <form method="POST" action="/movies/{{$details->id}}/review" placeholder="Dead Link">
    <input type="hidden" name="nickName" value="{{ auth()->user()->nickName }}">
        @csrf

        <textarea name="content" rows="4" cols="50" /></textarea>
        <button type="submit">
            Submit
        </button>
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
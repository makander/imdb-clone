@extends('layouts.app')
@section('content')

<div class="main">
    <div class="media" style="display:flex;flex-direction:column;">
        <div style="opacity:0.7;
        background-image: url('https://image.tmdb.org/t/p/original<?php echo $details->backdrop_path ?>');
        height:50vh;
        width:100vw;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;"></div>

        <div style="width:80vw;height:500px; display:flex;">
            <img src="http://image.tmdb.org/t/p/w500//{{$details->poster_path}}" class="align-self-start mr-3" alt="...">
            <div class="media-body jumbotron">
                <h5 class="mt-0">{{$details->title}}</h5>
                <h3>Summary</h3>
                <p>{{$details->overview}}</p><br>
                <h5>Release Date</h5>
                <?php echo $details->release_date ?>
                <h5 style="margin-top:5px;">Rating <?php echo $details->vote_average ?>/10 </h5>
            </div>
        </div>
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
                    <a class="dropdown-item"> {{ $watchlist->list_name }}</a>
                    <input type="hidden" name="list_id" value="{{ $watchlist->id }}">
                @endforeach
            </div>
            <button type="submit">Add</button>
        </form>
    </div>
   
</div>
@endif
   

@if(auth()->user());
<div>
   <form method="POST" action="{{ route('review.create', [$details->id])}}">
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
</div>
<script>
document.onload = alert('hello');
</script>
@endsection 
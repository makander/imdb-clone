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
    
@if(auth()->user());
<div>
   <form method="POST" action="{{ route('review.create', [$details->id])}}">
    <!-- action="/movies/{{$details->id}}/review" -->
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

</script>
@endsection 
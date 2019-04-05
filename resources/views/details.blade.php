@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/details.css') }}">

<div class="media">
    <div class="background"
        style="background-image: url('https://image.tmdb.org/t/p/original{{ $details->backdrop_path}}');">
    </div>

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="d-flex flex-row">
                <div class="p-2">
                    <img src="http://image.tmdb.org/t/p/w500//{{$details->poster_path}}" class="shadow" alt="...">
                </div>
                <div>
                    <div class="m-4 p-4">
                        <h1 class="display-4">{{$details->title}}</h1>
                        <h3>Summary</h3>
                        <p> Release Date: {{ $details->release_date}} </p>
                        <p id="summary"> {{$details->overview}}</p>
                        <h5>Release Date: {{ $details->release_date}} </h5>
                        <h5>Rating: {{ $details->vote_average}}</h5>

                        @if(auth()->user())
                        <div>

                            <form class="form-inline" method="POST"
                                action="{{ route('movielist.store', [$details->id])}}">
                                @csrf
                                <input type="hidden" name="movie_title" value="{{ $details->title }}">
                                <input type="hidden" name="movie_pic" value="{{ $details->poster_path }}">

                                <label class="col-md-4 control-label" for="watchlists">Add to watchlist</label>
                                <div class="col-md-4">
                                    <select id="" name="list_id" class="form-control p-3">
                                        @foreach ($watchlists as $watchlist)
                                        <option value="{{ $watchlist->id }}">{{ $watchlist->list_name }} </option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-success px-2" type="submit">Add</button>
                                </div>
                            </form>
                        </div>
                        @endif


                        @if(auth()->user())
                        <div class="form-group">
                            <form method="POST" action="{{ route('review.create', [$details->id])}}">
                                <input type="hidden" name="nickName" value="{{ auth()->user()->nickName }}">
                                @csrf

                                <label for="Review">Review</label>
                                <textarea class="form-control" name="content" rows="4" cols="50" /></textarea>
                                <div>
                                    <button type="submit" class="btn btn-outline-success">Submit</button>
                                </div>
                            </form>
                        </div>
                        @endif
                        @foreach ($reviews as $review)
                        <p> User: {{$review->nickName}} Review: {{$review->content}} </p>
                        <div class="form-group">
                            @if(auth()->user() == true && auth()->user()->id == $review->author_id)


                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Edit review
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Review</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body d-flex">

                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <form method="GET"
                                                        action="{{ route('review.update', [$review->id])}}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PUT') }}
                                                        <textarea name="content" rows="3" cols="40" /></textarea>
                                                        <button class="btn btn-outline-primary"
                                                            type="submit">Edit</button>
                                                    </form>
                                                </li>
                                                <li class="list-inline-item">
                                                    <form method="POST"
                                                        action="{{ route('review.destroy', [$review->id])}}">
                                                        {{ csrf_field() }} {{ method_field('DELETE') }}

                                                        <button class="btn btn-outline-danger" type="submit">
                                                            Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- 
                            <form method="GET" action="{{ route('review.update', [$review->id])}}">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <textarea name="content" rows="3" cols="40" /></textarea>
                                </br>
                                <button class="btn btn-outline-primary" type="submit">Edit</button>
                            </form>

                            <form method="POST" action="{{ route('review.destroy', [$review->id])}}">
                                {{ csrf_field() }} {{ method_field('DELETE') }}

                                <button class="btn btn-outline-danger inline" type="submit">
                                    Delete</button>
                            </form> -->

                    </div>
                    @endif

                    @endforeach

                </div>
            </div>
        </div>

    </div>


</div>
</div>
<script>
</script>
@endsection

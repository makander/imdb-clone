@extends('layouts.app')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/details.css') }}">

<div class="media">
    <div class="background p-2 d-none d-md-block d-xl-non py-5"
        style="background-image: url('https://image.tmdb.org/t/p/original{{ $details->backdrop_path}}');">
    </div>

    <div class="container my-4">
        <div class="d-flex justify-content-center">

            <div class="d-flex flex-row">
                <div id="poster-desktop" class="p-2 d-none d-md-block d-xl-non">
                    <img src="http://image.tmdb.org/t/p/w342/{{$details->poster_path}}" class="shadow-lg" alt="...">
                </div>

                <div>

                    <div id="poster-mobile" class="pb-4 d-block d-sm-none justify-content-center">
                        <img src="http://image.tmdb.org/t/p/w185/{{$details->poster_path}}"
                            class="shadow-lg mx-auto d-block" alt="...">
                    </div>

                    <div class="mx-2 px-4">
                        <h2 class="d-block d-sm-none">{{$details->title}}</h2>
                        <h1 class="display-4 d-none d-md-block d-xl-non">{{$details->title}}</h1>

                        <div class="py-2">
                            <p class="d-inline font-weight-bold"> Release Date: </p>
                            <p class="d-inline">{{ $details->release_date}} </p>
                        </div>


                        <div>
                            <p class=" d-inline font-weight-bold">Genres:</p>
                            @foreach ($details->genres as $key => $value )
                            <p class="d-inline">{{$value->name}}, </p>
                            @endforeach
                        </div>


                        <h3 class="pt-4">Summary</h3>
                        <p class=""> {{$details->overview}}</p>
                        <p>Rating: {{ $details->vote_average}}</p>


                    </div>
                    @if(auth()->user())

                    <div class="mx-4 px-4">
                        <form class="form-inline" method="POST" action="{{ route('movielist.store', [$details->id])}}">
                            @csrf
                            <input type="hidden" name="movie_title" value="{{ $details->title }}">
                            <input type="hidden" name="movie_pic" value="{{ $details->poster_path }}">

                            <label class="col-md-4 control-label" for="watchlists">Add to watchlist</label>
                            <div class="col-md-4">
                                <select id="" name="list_id" class="form-control">
                                    @foreach ($watchlists as $watchlist)
                                    <option value="{{ $watchlist->id }}">{{ $watchlist->list_name }} </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-success px-2" type="submit">Add</button>
                            </div>
                        </form>
                    </div>
                    @endif

                    <div class="mx-2 px-4 pt-4">
                        <h2 class="d-none d-md-block d-xl-non">Reviews</h2>
                        <h4 class="d-block d-sm-none">Reviews</h4>
                    </div>
                    @foreach ($reviews as $review)
                    <div class="mx-2 px-4">
                        <hr>
                        <p class="font-weight-bold"> User: {{$review->nickName}} </p> </br>
                        <p>{{$review->content}} </p>

                        @if(auth()->user() == true && auth()->user()->id == $review->author_id)
                        <div class="btn-group">

                            <form method="POST" action="{{ route('review.destroy', [$review->id])}}">
                                {{ csrf_field() }} {{ method_field('DELETE') }}

                                <button class="btn btn-outline-danger mr-2" type="submit">Delete</button>
                            </form>

                            <div class="form-group">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    Edit review
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Review
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
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
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        @endforeach
                        <div class="mx-2 px-4">
                            <hr>
                            @if(auth()->user())
                            <div class="form-group">
                                <form method="POST" action="{{ route('review.create', [$details->id])}}">
                                    <input type="hidden" name="nickName" value="{{ auth()->user()->nickName }}">
                                    @csrf

                                    <label for="Review">Submit review</label>
                                    <textarea class="form-control" name="content" rows="4" cols="50" /></textarea>
                                    <div>
                                        <button type="submit" class="btn btn-outline-success m-2">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <hr>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection
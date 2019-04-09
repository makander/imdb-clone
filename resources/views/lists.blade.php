@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/lists.css') }}">



<div>
    @if($movieImageArray)
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        @foreach($movieImageArray as $key => $movieImg)
        @if($key == 0)
        <div class="carousel-item active">
            @else
            <div class="carousel-item">
                @endif
                <div style="
        background-image: url('https://image.tmdb.org/t/p/original/{{$movieImageArray[$key]}}');
        height:60vh;
        width:100vw;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;"></div>
            </div>
            @endforeach

        </div>
        @endif

    </div>



    <div>
        <h1>Watchlists</h1>
    </div>
    <div class="container xcontainer">


        <form class="form-inline" form method="POST" action="{{ route('lists.create')}}">
            @csrf
            <div class="xsearch">
                <label class="sr-only" for="inlineFormInputName2">Name</label>
                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Create List"
                    name="list_name">

                <button type="submit" class="btn btn-outline-success mb-2">Submit</button>

            </div>
        </form>

        <ul class="container xcontainer">
            @if($lists)
            @foreach ($lists as $key=>$list)
            <li class="card ml-5 mt-3 bg-dark xcard shadow">
                <a href="/movielist/{{$list->id}}">
                    @if(in_array($key, $movieImageArray))
                    <img class="card-img-top" style="
                background-image: url('https://image.tmdb.org/t/p/original/{{$movieImageArray[$key]}}');
                height:35vh;
                background-position: center;
                background-size: cover;
                ">
                    @else
                    <img class="card-img-top" style="
                    height:35vh;
                    background-color: #343a40;
                    ">
                    @endif
                    <div class="container bg-dark">

                        <a class="btn btn-link xa" href="/movielist/{{$list->id}}"> {{$list->list_name}}</a>
                        <br>


                        <form method="GET" class="form-check form-check-inline"
                            action="{{ route('lists.update', [$list->id])}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="text" name="updated_name" placeholder="edit name"
                                class="form-control mb-2 mr-sm-2">
                            <button type="submit" class="btn btn-outline-success mb-2">Edit</button>
                        </form>

                        <form method="POST" class="form-check form-check-inline"
                            action="{{ route('lists.destroy', [$list->id])}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }} <button type="submit" class="btn btn-outline-success mb-2">
                                Delete</button>
                        </form>
                    </div>
                </a>

            </li>

            @endforeach
            @endif
        </ul>

    </div>




    @endsection
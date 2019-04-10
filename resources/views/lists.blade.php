@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/lists.css') }}">



<div class="background d-none d-md-block d-xl-non">
    @if($movieImageArray)
    <div id=" carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
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
</div>
<div class="pt-4">
    <h1>Watchlists</h1>
</div>


<div class="d-flex justify-content-center">
    <form class="form-inline" form method="POST" action="{{ route('lists.create')}}">
        @csrf

        <label class="sr-only" for="inlineFormInputName2">Name</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Create List"
            name="list_name">
        <button type="submit" class="btn btn-outline-success mb-2">Submit</button>
    </form>
</div>

<div class="container">

    <ul class="list-inline">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled text-center">
                @foreach ($errors->all() as $error)
                <li class="list-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </ul>    

        @endif


        <div class="d-flex justify-content-center flex-wrap">
            @if($lists)
            @foreach ($lists as $key=>$list)
            <div class="card m-4 p-2 bg-dark w-auto text-center shadow">
                <a href="/movielist/{{$list->id}}">
                    @if($movieImageArray[$key] !== 'nopic')
                    <img class="card-img-top" style=" background-image:
                        url('http://image.tmdb.org/t/p/w400/{{$movieImageArray[$key]}}'); height:35vh;
                        background-position: center; background-size: cover; ">
                    @elseif ($movieImageArray[$key] == 'nopic')
                    <img class="card-img-top" style=" height:35vh; background-color: #343a40; ">
                    @endif
                    <div class=" container bg-dark pb-4">

                        <a class="btn btn-link xa" href="/movielist/{{$list->id}}"> {{$list->list_name}}</a>
                        <br>


                        <form method="GET" class="form-check form-check-inline"
                            action="{{ route('lists.update', [$list->id])}}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="text" name="updated_name" placeholder="edit name"
                                class="form-control mb-2 mr-1">
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

            </div>

            @endforeach
            @endif
        </div>

</div>




@endsection
@extends('layouts.app')
@section('content')


<div>
    @if($moviesInList[0])
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-item active">
            <div style="
        background-image: url('https://image.tmdb.org/t/p/original/{{$moviesInList[0]->movie_pic}}');
        height:60vh;
        width:100vw;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;"></div>
        </div>
        <div class="carousel-item">
            <div class="media" style="display:flex;flex-direction:column;">
                <div style="
        background-image: url('https://image.tmdb.org/t/p/original/{{$moviesInList[1]->movie_pic}}');
        height:60vh;
        width:100vw;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;"></div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="media" style="display:flex;flex-direction:column;">
                <div style="
        background-image: url('https://image.tmdb.org/t/p/original/{{$moviesInList[2]->movie_pic}}');
        height:60vh;
        width:100vw;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;"></div>            
        </div>
    </div>
    @endif

</div>

<div class="container">


    <div>
        <h1>Lists Overview</h1>
    </div>

    <form class="form-inline" form method="POST" action="{{ route('lists.create')}}">
    @csrf
        <label class="sr-only" for="inlineFormInputName2">Name</label>
        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Create List" name="list_name">

        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form> 

    <ul class="list-unstyled">
        @foreach ($lists as $list)
        <li class="">

            <a class="btn btn-link" href="/movielist/{{$list->id}}"> {{$list->list_name}}</a>
        
            <form method="POST" class="form-check form-check-inline" action="{{ route('lists.destroy', [$list->id])}}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }} <button type="submit" class="btn btn-primary mb-2">
                    Delete</button>
            </form>

            <form method="GET" class="form-check form-check-inline" action="{{ route('lists.update', [$list->id])}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <input type="text" name="updated_name" placeholder="edit name" class="form-control mb-2 mr-sm-2">
                <button type="submit" class="btn btn-primary mb-2">Edit</button>
            </form>

        </li>

        @endforeach
    </ul>

</div>




@endsection
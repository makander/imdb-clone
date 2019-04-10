@extends('layouts.app')


@section('content')

<div class="container d-flex flex-wrap p-2 justify-content-center" style="margin: 40px 0;" >

    @foreach($genres as $key => $genre)
    
            
                <form method="POST" value="{{ $key }}" class="form-check form-check-inline" action="{{ route('advsearch', ['genre' => $key])}}">
                    {{ csrf_field() }}

                    <button class="btn btn-outline-success mb-2"><input style="display: none;" type="submit" name="advancedsearch" value="{{ $key }}">{{ $genre }}</button>
                    
                </form>

    @endforeach

</div>

    @endsection

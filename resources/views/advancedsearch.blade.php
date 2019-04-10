@extends('layouts.app')
@section('content')

<div class="container d-flex flex-wrap align-items-center" style="height: 80vh;" >

<div class="d-flex justify-content-around flex-wrap">
    @foreach($genres as $key => $genre)
    
    
                <form method="POST" value="{{ $key }}" class="form-check form-check-inline" action="{{ route('advsearch', ['genre' => $key])}}">
                    {{ csrf_field() }}

                    <button class="btn btn-outline-success mb-2"><input style="display: none;" type="submit" name="advancedsearch" value="{{ $key }}">{{ $genre }}</button>
                </form>

    @endforeach
</div>
</div>

    @endsection

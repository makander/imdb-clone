@extends('layouts.app')
@section('content')

this is the actual list view.
Badumdish

<form method="POST" action="/lists">
    @csrf

    <input type="text" name="list_name"/>
    
    <button type="submit">
        Create new list
    </button>
</form>

<!-- {{ auth()->user() }} -->
{{$lists}}

@endsection
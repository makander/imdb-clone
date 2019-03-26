@extends('layouts.app')
@section('content')

this is the actual list view.
Badumdish

<form method="POST" action="">
    @csrf
    <input type="text" placeholder="list name" />

    <button>
        Create new list
    </button>

</form> <!-- {{ auth()->user() }} -->
{{$lists}}

@endsection
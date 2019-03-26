@extends('layouts.app')
@section('content')

this is the actual list view.
Badumdish

<div>
    <form method="POST" action="/lists">
        @csrf

        <input type="text" name="list_name" />

        <button type="submit">
            Create new list
        </button>
    </form>
</div>
<ul>
    @foreach ($lists as $list)
    <li>

        <a href="/movielist/{{$list->id}}"> {{$list->list_name}}</a>
        <form method="POST" action="{{ route('lists.destroy', [$list->id])}}"> {{ csrf_field() }}
            {{ method_field('DELETE') }} <button type="submit">
                Delete</button>
        </form>

        <form method="GET" action="{{ route('lists.update', [$list->id])}}"> {{ csrf_field() }}

            {{ method_field('PUT') }}
            <input type="text" name="updated_name">
            <button type="submit">Update</button>
        </form>


    </li>

    @endforeach
</ul>
<!-- {{ auth()->user() }} -->
{{$lists}}

@endsection
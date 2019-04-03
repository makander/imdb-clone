@extends('layouts.app')
@section('content')


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
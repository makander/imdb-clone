@extends('layouts.app')
@section('content')
@if(auth()->user()->role == 1)
<div>
    <div class="row" style="margin-right: 0;">
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
      <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false">Users</a>
      <a class="nav-link" id="v-pills-reviews-tab" data-toggle="pill" href="#v-pills-reviews" role="tab" aria-controls="v-pills-reviws" aria-selected="false">Reviews</a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
      
      <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Dashboard</h1>
                <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
      </div>

      </div>
      <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
      
      <h2>Overview of users</h2>
      <p>You can delete users from Dimb here</p>

      <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                 <th scope="col">ID</th>
                 <th scope="col">First name</th>
                 <th scope="col">Last name</th>
                 <th scope="col">Email</th>
                 <th scope="col">Role</th>
                 <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>

                @foreach($users as $user)
                <tr>
                <th scope="row">{{$user->id}}</th>
                    <td>{{$user->firstName}}</td>
                    <td>{{$user->lastName}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                    
                    <form method="POST" action="{{ route('users.delete', [$user->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }} 
                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                    </form>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
    
    <div class="tab-pane fade" id="v-pills-reviews" role="tabpanel" aria-labelledby="v-pills-reviews-tab">
      
      <h2>Overview of reviews</h2>
      <p>You can approve reviews here</p>

      <div class="table-responsive">
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Movie ID</th>
      <th scope="col">Author</th>
      <th colspan="2">Review</th>
      <th scope="col">Rating</th>
      <th scope="col">Approved?</th>
    </tr>
  </thead>
  <tbody>

  @foreach($reviews as $review)
    <tr>
      <th scope="row">{{ $review->movie_id }}</th>
      <td>{{ $review->nickName }}</td>
      <td colspan="2">{{ $review->content }}</td>
      <td>{{ $review->reviewRating }}</td>
      <td>
      <form method="GET" action="{{ route('review.approve', [$review->id])}}" style="display: inline-block">
          {{ csrf_field() }}
          {{ method_field('PUT') }} 
          <button type="submit" class="btn btn-success btn-sm">✓</button>
        </form>
        <form method="POST" action="{{ route('review.delete', [$review->id])}}" style="display: inline-block">
          {{ csrf_field() }}
          {{ method_field('DELETE') }} 
          <button type="submit" class="btn btn-danger btn-sm">X</button>
        </form>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
      </div>
      </div>
      
    </div>
  </div>
</div>
    
</div>
@endif
@endsection
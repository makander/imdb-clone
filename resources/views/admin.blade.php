@extends('layouts.app')
@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">

@if(auth()->user()->role == 1 || auth()->user()->role == 2)
<div class="dashboard-all">
    <div class="row" style="margin-right: 0;">
  <div class="col-4">
  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <h5>You are logged in as</h5>
      <h6>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h5>
  </div>
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active " id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
      <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false">Users</a>
      <a class="nav-link" id="v-pills-reviews-tab" data-toggle="pill" href="#v-pills-reviews" role="tab" aria-controls="v-pills-reviws" aria-selected="false">Reviews <span class="badge badge-secondary">{{ count($reviews) }}</span></a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
      
      <div class="jumbotron jumbotron-fluid">
      </div>
            <div class="container dashboard">
                <h2>Dashboard</h2>
                <div class="dashboard-overview">Total users: <span class="badge badge-success">{{ count($users) }} </div>
                <div class="dashboard-overview">Total pending reviews:  <span class="badge badge-success">{{ count($reviews) }} </span></div>
                
            </div>
      

      </div>
      <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">
      
      <div class="header-users">
      <h2>Overview of users</h2>
      <p>You can delete users from Dimb here</p>
</div>

      <div class="card">
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

                    <button style="display: inline-block" class="btn btn-primary btn-sm" type="submit" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">✎</button>
                    
                    <form method="POST" action="{{ route('users.delete', [$user->id])}}" style="display: inline-block">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }} 
                        <button type="submit" class="btn btn-danger btn-sm">✘</button>
                    </form>

                    <div class="collapse" id="collapseExample">
                      <div class="card card-body">
                          <form method="GET" action="{{ route('users.edit', [$user->id])}}" style="display: inline-block">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }} 

                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Fullname:</span>
                              </div>
                                <input type="text" aria-label="First name" name="firstName" class="form-control" placeholder="{{ $user->firstName }}" required>
                                <input type="text" aria-label="Last name" name="lastName" class="form-control" placeholder="{{ $user->lastName }}" required>
                            </div>

                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Email:</span>
                              </div>
                                <input type="text" aria-label="Email" name="email" class="form-control" placeholder="{{ $user->email }}" required>
                            </div>

                            @if (auth()->user()->role == 2)

                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Role:</span>
                              </div>
                              <input type="text" aria-label="Role" name="role" class="form-control" placeholder="{{ $user->role }}" required>
                            </div>
                                
                            @endif

                        <button class="btn btn-success btn-sm" style="float: right;">Submit changes</button>



                    </form>
                      </div>
                    </div>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </div>
    
    <div class="tab-pane fade" id="v-pills-reviews" role="tabpanel" aria-labelledby="v-pills-reviews-tab">
      
    <div class="header-reviews">
      <h2>Overview of reviews</h2>
      <p>You can approve reviews here</p>
</div>

      <div class="card">
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
      <th scope="row"><a href="{{ route('movie.get', [$review->movie_id]) }}">{{ $review->movie_id }}</a></th>
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
    
</div>
@endif
@endsection
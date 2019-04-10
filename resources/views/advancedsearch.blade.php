@extends('layouts.app')


@section('content')

<div class="container d-flex flex-wrap p-2 justify-content-center">

    <div class="card m-2 d-flex justify-content-center" style="width: 18rem;">
        <div class="card-body text-center">
            <h5 class="pr-3">Action</h5>
            <div>
                <form method="POST" class="form-check form-check-inline" action="">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-outline-success mb-2">
                        Search</button>
                    <div>
                </form>
            </div>
        </div>
    </div>
</div>

    @endsection

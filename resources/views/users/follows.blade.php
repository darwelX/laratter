@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-md-4 offset-md-4">
            <div class="card mt-2 p-1" style="width: 20rem;">
                <img class="card-img-top rounded-circle img-fluid p-3" src="{{$user->avatar}}" alt="{{$user->name}}">
                <div class="card-block">
                    <h4 class="card-title"><a href="/{{$user->username}}" class="btn btn-link">{{$user->username}}</a></h4>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($follows as $follow)
                        <li class="list-group-item">{{$follow->username}}</li>
                    @endforeach       
                </ul>
            </div>
        </div>
    </div>
@endsection
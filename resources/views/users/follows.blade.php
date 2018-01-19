@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-md-4 offset-md-4">
            <div class="card mt-2 p-1" style="width: 20rem;">
                <img class="card-img-top rounded-circle img-fluid p-3" src="{{$user->avatar}}" alt="{{$user->name}}">
                <div class="card-block">
                <a href="/{{$user->username}}" class="btn btn-link"><h4 class="card-title">{{$user->username}}</h4></a>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($follows as $follow)
                        <li class="list-group-item">
                            <a href="/{{$follow->username}}">
                                <img src="{{$follow->avatar}}" alt="{{$follow->username}}" class="rounded-circle img-fluid avatar mr-2">
                            </a>            
                            {{$follow->username}}
                        </li>
                    @endforeach       
                </ul>
            </div>
        </div>
    </div>
@endsection
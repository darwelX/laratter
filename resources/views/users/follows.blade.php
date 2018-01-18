@extends('layouts.app')

@section('content')
    <ul>
  @foreach($user->follows as $follow)
      <li>{{$follow->username}}</li>
  @endforeach
    </ul>
@endsection
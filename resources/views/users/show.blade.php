@extends('layouts.app')

@section('content')

<h1>{{$user->name}}</h1>
<a href="/{{$user->username}}/follows">
  Sigue a <span class="badge badge-pill badge-success">{{ ($user->follows->count()>0)? $user->follows->count() : 0 }}</span>
</a>
<a href="/{{$user->username}}/followed">
  Seguido por <span class="badge badge-pill badge-info">{{ $user->follows->count()}}</span>
</a>
  @if(Auth::check())
    @if(Auth::user()->isFollowing($user))
      <form action="/{{$user->username}}/unfollow" method="post" class="mb-2 mt-2">
        {{ csrf_field() }}
        @if(session('success'))
          <span class="text-success">{{ session('success') }}</span>
        @endif
        <button class="btn btn-danger">Dejar de Seguir</button>
      </form>
    @else
      <form action="/{{$user->username}}/follow" method="post" class="mb-2 mt-2">
        {{ csrf_field() }}
        @if(session('success'))
          <span class="text-success">{{ session('success') }}</span>
        @endif
        <button class="btn btn-primary">Seguir</button>
      </form>    
    @endif
  @endif
  <div class="row">
@forelse($messages as $message)
    <div class="col-6">
      @include('messages.message')
    </div>
@empty
    <p>No hay mensajes</p>
@endforelse
    <div class="mt-2 mx-auto">
      @if(count($messages))
        {{$messages->links('pagination::bootstrap-4')}}
      @endif
    </div>
  </div>

@endsection
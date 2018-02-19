@extends('layouts.app')

@section('content')
  <div class="row mt-2">
    <div class="col-2">
      <img class="card-img-top rounded-circle img-fluid avatar-medium" src="{{$user->avatar}}" alt="{{$user->name}}">
    </div>
    <div class="col-8">
      <h1 class="mt-5">{{$user->name}}</h1>
      @if(Gate::allows('equals', $user))
        <private :username="'{{$user->username}}'"></private>
      @endif
    </div>
  </div>
  @if(Gate::allows('equals', $user))
    <div class="row mt-2">
      <div class="col-12">
        <a href="/{{$user->username}}/follows">
          Sigue a <span class="badge badge-pill badge-success">{{ ($user->follows->count()>0)? $user->follows->count() : 0 }}</span>
        </a>
        <a href="/{{$user->username}}/followed">
          Seguido por <span class="badge badge-pill badge-info">{{ $user->follows->count()}}</span>
        </a>
      </div>
    </div>
  @endif

  @if(Auth::check())

    @if(Gate::allows('dms', $user) and Gate::denies('equals', $user))
      <form action="/{{$user->username}}/dms" method="post" class="mt-2">
          {{ csrf_field() }}
          <div class="form-group">
            <input type="text" name="message" id="message" class="form-control" placeholder="Enviar mensaje..">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar DM</button>
          </div>
      </form>
    @endif

    @if(Auth::user()->isFollowing($user))
      <form action="/{{$user->username}}/unfollow" method="post" class="mb-2 mt-2">
        {{ csrf_field() }}
        @if(session('success'))
          <span class="text-success">{{ session('success') }}</span>
        @endif
        <button class="btn btn-danger">Dejar de Seguir</button>
      </form>
    @elseif(Gate::denies('equals', $user))
      @if(Auth::user()->isInvitation($user))
        <div class="form-group mt-2">
          <span class="text-success">{{ session('success') }}</span>
          <button class="btn btn-secondary btn-lg" disabled>@lang('app.invitationPending')</button>
        </div>
      @elseif(Auth::user()->notInvitation($user))
        <form action="/{{$user->username}}/follow" method="post" class="mb-2 mt-2">
          {{ csrf_field() }}
          @if(session('success'))
            <span class="text-success">{{ session('success') }}</span>
          @endif
          <button class="btn btn-primary">Seguir</button>
        </form>    
      @endif
    @endif

  @endif <!-- fin de usuario autenticado -->

  @if(Gate::allows('equals', $user) or !$user->private)
    @include('messages.listmessage')
  @elseif(Gate::allows('dms', $user))
    @include('messages.listmessage')
  @else
    <div class="jumbotron">
      <h1 class="display-3 text-center">@lang('app.profile_private')!</h1>
      <hr class="my-4">
      <p class="lead text-center">
        <span class="fa fa-lock color-icon fa-5x"></span>
      </p>
    </div>
  @endif

@endsection
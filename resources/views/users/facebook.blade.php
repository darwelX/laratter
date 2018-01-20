@extends('layouts.app')

@section('content')
<form class="form pt-4" action="/auth/facebook/register" method="post">
  {{csrf_field()}}
  <div class="card">
    <div class="card-block">
        <img src="{{$user->avatar}}" alt="{{$user->name}}" class="rounded-circle img-fluid">
    </div>

    <div class="card-block">
        <div class="form-group">
            <label for="name" class="form-control-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" readonly>
        </div>

        <div class="form-group">
            <label for="email" class="form-control-label">Email</label>
            <input type="text" name="email" id="email" readonly class="form-control" value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="username" class="form-control-label">Nombre de Usuario</label>
            <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}">
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">
            Registrarse
        </button>
    </div>
  </div>
</form>
@endsection 
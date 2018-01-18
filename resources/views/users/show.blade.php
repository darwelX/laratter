@extends('layouts.app')

@section('content')

<h1>{{$user->name}}</h1>
<form action="/{{$user->username}}/follow" method="post" class="mb-2">
  {{ csrf_field() }}
  @if(session('success'))
    <span class="text-success">{{ session('success') }}</span>
  @endif
  <button class="btn btn-primary">Follow</button>
</form>
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
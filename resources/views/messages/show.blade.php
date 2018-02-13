@extends('layouts.app')
@section('content')
<div class="col-6 mx-auto mt-3">
  <h1 class="h3">Mensaje id: {{$message->id}}</h1>
  @include('messages.message')
  <responses :message="{{ $message->id}}"></responses>
</div>
@endsection
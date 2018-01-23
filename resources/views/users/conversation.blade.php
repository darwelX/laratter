@extends('layouts.app')

@section('content')
  <!-- el metodo except excluye un usuario por id -->
  <!-- el metodo convierte un objeto a string pasandole como parametro el campo y el separador, porque pueden existir conversacion con multiples usuarios-->
  <h3>Conversación con: <small class="text-muted">{{ $conversation->users->except($user->id)->implode('name', ', ') }}</small></h3>
  <div class="card">
      <div class="card-block">
    @foreach($conversation->privateMessages as $message)
        <blockquote class="blockquote">
          <p><strong>{{ $message->user->name }}</strong> dijo...</p>
          <p class="ml-3 font-italic">{{ $message->message }}</p>
          <small class="text-muted">{{ $message->created_at}}</small>
        </blockquote>
    @endforeach
      </div>
  </div>
@endsection
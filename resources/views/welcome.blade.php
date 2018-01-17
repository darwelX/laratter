@extends('layouts.app')

@section('content')
  <div class="jumbotron text-center">
    <h1>Laratter</h1>
    <nav>
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        </ul>
    </nav>
  </div>

  <div class="row">
    <div class="col-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
        <div class="card panel">
            <div class="card-block">
                <div class="card-header">
                    <div class="card-title">Nuevo</div>
                </div>
                <form action="/messages/create" method="post"> 
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="contenido">
                            Contenido
                        </label>
                        @if($errors->has('contenido'))
                            @foreach($errors->get('contenido') as $error)
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{$error}}
                                </div>
                            @endforeach
                        @endif
                        <textarea name="contenido" id="contenido" class="form-control @if($errors->has('contenido')) is-invalid @endif" cols="30" rows="5" placeholder="Que estas pensando?"></textarea>
                        <!-- <div class="invalid-feedback">Error</div> -->
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Enviar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    @forelse($messages as $message)
        <div class="col-6">
            @include('messages.message')
        </div>
    @empty
        <p>No hay mesajes destacados</p>
    @endforelse

    <div class="mt-2 mx-auto">
        @if(count($messages))
            {{$messages->links('pagination::bootstrap-4')}}
        @endif
    </div>
  </div>
@endsection
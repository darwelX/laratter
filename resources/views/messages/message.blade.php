<div class="card mb-2">
  <img class="card-img-top" src="{{$message->image}}" alt="">
  <div class="card-block">
    <h4 class="card-title">Mensaje</h4>
    <p class="card-text">{{$message->content}}</p>
    <a href="/messages/{{$message->id}}" class="btn btn-primary">Leer más..</a>
  </div>
  <div class="card-footer text-muted float-right">
    {{$message->created_at}}
  </div>
</div>
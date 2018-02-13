<div class="row mt-3">
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
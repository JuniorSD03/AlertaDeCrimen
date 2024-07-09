@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="my-4">Notificaciones</h2>

    @if($notificaciones->isEmpty())
    <p>No hay notificaciones.</p>
    @else
    <div class="list-group">
        @foreach($notificaciones as $notificacion)
        <div class="list-group-item">
            <p class="mb-1">{{ $notificacion->mensaje }}</p>
            <small class="text-muted">{{ $notificacion->created_at}}</small>
            <form action="/notificacions/{{ $notificacion->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger mt-3" onclick="return confirm('¿Estás seguro de que deseas eliminar esta notificación?')">Eliminar</button>
            </form>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection
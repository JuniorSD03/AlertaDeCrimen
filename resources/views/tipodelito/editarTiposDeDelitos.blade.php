@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/tipodelitos" class="btn btn-secondary mb-3">Retroceder</a>
    <h2>Editar Tipo de Delito</h2>

    <form action="/tipodelitos/{{ $tipoDelito->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $tipoDelito->nombre }}">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $tipoDelito->descripcion }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Tipo de Delito</button>
    </form>
</div>
@endsection
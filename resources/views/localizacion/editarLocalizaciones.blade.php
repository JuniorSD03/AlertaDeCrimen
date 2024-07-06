@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/localizacions" class="btn btn-secondary mb-3">Retroceder</a>
    <h2>Editar Dirección</h2>

    <form action="/localizacions/{{ $localizaciones->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="direccion">Nombre:</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $localizaciones->direccion }}">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $localizaciones->descripcion }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
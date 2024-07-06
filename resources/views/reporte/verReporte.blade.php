@extends('layouts.app')

@section('content')
<div class="container card">
    <a href="{{ route('reportes.index') }}" class="btn btn-secondary mb-3">Retroceder</a>
    <div class="text-center">
        <div class="card-header">
            <h2 class="card-title">{{ $reporte->titulo}}</h2>
        </div>
        <div class="card-body">
            @if($reporte->imagen)
                <img src="{{ asset('imagen/' . $reporte->imagen) }}" class="img-fluid mb-3" alt="Imagen del Reporte" style="width: 100%; object-fit: cover;">
            @else
                <img src="https://via.placeholder.com/1200x600" class="img-fluid mb-3" alt="Imagen del Reporte" style="width: 100%; height: 300px; object-fit: cover;">
            @endif
            <p class="card-text"><strong>Autor:</strong> {{ $reporte->user_name }}</p>
            <p class="card-text"><strong>Descripción:</strong> {{ $reporte->descripcion }}</p>
            <p class="card-text"><strong>Fecha y Hora:</strong> {{ $reporte->created_at->format('d-m-Y H:i') }}</p>
            <p class="card-text"><strong>Ubicación:</strong> {{ $reporte->localizacion_nombre }}</p>
            <p class="card-text"><strong>Tipo:</strong> {{ $reporte->tipo_delito_nombre }}</p>
        </div>
    </div>

    <h3 class="my-4">Comentarios</h3>

    <!-- Comentarios estáticos -->
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text"><strong>Juan Pérez</strong></p>
            <p class="card-text">Este es un comentario estático para propósitos de demostración.</p>
            <p class="card-text"><small class="text-muted">28-06-2024 16:30</small></p>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text"><strong>María López</strong></p>
            <p class="card-text">Este es otro comentario estático para propósitos de demostración.</p>
            <p class="card-text"><small class="text-muted">29-06-2024 14:45</small></p>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text"><strong>Carlos García</strong></p>
            <p class="card-text">Este es un tercer comentario estático para propósitos de demostración.</p>
            <p class="card-text"><small class="text-muted">30-06-2024 12:00</small></p>
        </div>
    </div>

    <!-- Formulario para agregar comentario -->
    <form method="POST" action="{{ route('comentarios.store') }}">
        @csrf
        <div class="form-group">
            <label for="descripcion">Agregar Comentario</label>
            <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required>{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="hidden" name="reporte_id" value="{{ $reporte->id }}">
        <button type="submit" class="btn btn-primary mt-3">Comentar</button>
    </form>
</div>
@endsection

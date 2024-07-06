@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="my-4">Crímenes Reportados</h2>

    @foreach($reportes as $reporte)
    <div class="card mb-3">
        <div class="card-header text-center">
            <h2 class="card-title">{{ $reporte->titulo }}</h2>
            <p class="text-left" style="font-size: 0.9em;">Por: <strong>{{ $reporte->user_name }}</strong></p>
        </div>
        <div class="card-body">
            @if($reporte->imagen)
            <img src="{{ asset('imagen/' . $reporte->imagen) }}" class="img-fluid mb-3" alt="Imagen del Reporte" style="width: 100%; height: 300px; object-fit: cover;">
            @else
            <img src="https://via.placeholder.com/800x400" class="img-fluid mb-3" alt="Imagen del Reporte" style="width: 100%; height: 300px; object-fit: cover;">
            @endif
            <p class="card-text"><strong>Descripción:</strong> {{ $reporte->descripcion }}</p>
            <p class="card-text"><strong>Fecha y Hora:</strong> {{ $reporte->created_at->format('d-m-Y H:i') }}</p>
            <p class="card-text"><strong>Ubicación:</strong> {{ $reporte->localizacion_nombre }}</p>
            <p class="card-text"><strong>Tipo de Delito:</strong> {{ $reporte->tipo_delito_nombre }}</p>
            <a href="/reportes/{{ $reporte->id }}" class="btn btn-primary">
                Ver Detalles
            </a>
        </div>
    </div>
    @endforeach

</div>
@endsection
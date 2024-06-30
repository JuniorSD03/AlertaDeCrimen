@extends('layouts.app')

@section('content')
<div class="container card  ">
    <a href="reportes" class="btn btn-secondary mb-3">Retroceder</a>
    <div class="text-center">
        <div class="card-header">
            <h2 class="card-title">REPORTE</h2>
        </div>
        <div class="card-body">
            <img src="https://via.placeholder.com/1200x600" class="img-fluid mb-3" alt="Imagen del Reporte">
            <p class="card-text"><strong>Autor:</strong> Autor del reporte</p>
            <p class="card-text"><strong>Descripción:</strong> Robo a mano armada en la tienda de conveniencia. Robo a mano armada en la tienda de conveniencia. Robo a mano armada en la tienda de conveniencia. Robo a mano armada en la tienda de conveniencia.</p>
            <p class="card-text"><strong>Fecha y Hora:</strong> 28-06-2024 15:30</p>
            <p class="card-text"><strong>Ubicación:</strong> Av. Principal 123, Ciudad</p>
            <p class="card-text"><strong>Tipo:</strong> Robo </p>
        </div>
    </div>
    <h3 class="my-4">Comentarios</h3>

    @foreach(range(1, 3) as $index)
    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>Usuario comentador</strong></p>
            <p class="card-text">Este es un comentario estático para propósitos de demostración.</p>
            <p class="card-text"><small class="text-muted">28-06-2024 16:30</small></p>
        </div>
    </div>
    @endforeach


    <a href="/formularioComentario" class="btn btn-primary mt-3">
        Comentar
    </a>
</div>
@endsection
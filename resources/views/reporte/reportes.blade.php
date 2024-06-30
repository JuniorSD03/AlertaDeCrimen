@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="my-4">Crímenes Reportados</h2>

    <div class="card mb-3">
        <div class="card-header">
            <h4 class="card-title">Juan Pérez</h4>
        </div>
        <div class="card-body">
            <img src="https://via.placeholder.com/800x400" class="img-fluid mb-3" alt="Imagen del Reporte">
            <p class="card-text"><strong>Descripción:</strong> Robo a mano armada en la tienda de conveniencia.</p>
            <p class="card-text"><strong>Fecha y Hora:</strong> 28-06-2024 15:30</p>
            <p class="card-text"><strong>Ubicación:</strong> Av. Principal 123, Ciudad</p>
            <a href="/verReporte" class="btn btn-primary">
                Ver Detalles
            </a>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <h4 class="card-title">María López</h4>
        </div>
        <div class="card-body">
            <img src="https://via.placeholder.com/800x400" class="img-fluid mb-3" alt="Imagen del Reporte">
            <p class="card-text"><strong>Descripción:</strong> Vandalismo en el parque central.</p>
            <p class="card-text"><strong>Fecha y Hora:</strong> 27-06-2024 10:00</p>
            <p class="card-text"><strong>Ubicación:</strong> Parque Central, Ciudad</p>
            <a href="/verReporte" class="btn btn-primary">
                Ver Detalles
            </a>
        </div>
    </div>

</div>
@endsection
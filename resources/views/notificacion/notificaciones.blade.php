@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="my-4">Notificaciones</h2>

    <div class="card mb-3">
        <div class="card-body">
            <h4 class="card-title">Notificación 1</h4>
            <p class="card-text"><strong>Descripción:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p class="card-text"><strong>Fecha y Hora:</strong> 29-06-2024 09:15</p>
            <p class="card-text"><strong>Origen:</strong> Sistema de Alertas</p>
            <a href="/verReporte" class="btn btn-primary">
                Ver Detalles
            </a>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h4 class="card-title">Notificación 2</h4>
            <p class="card-text"><strong>Descripción:</strong> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p class="card-text"><strong>Fecha y Hora:</strong> 28-06-2024 14:00</p>
            <p class="card-text"><strong>Origen:</strong> Administración del Sistema</p>
            <a href="/verReporte" class="btn btn-primary">
                Ver Detalles
            </a>
        </div>
    </div>

</div>
@endsection
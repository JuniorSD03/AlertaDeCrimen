@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>

                    <!-- Sección de Bienvenida -->
                    <div class="jumbotron">
                        <h1 class="display-4">¡Bienvenido!</h1>
                        <p class="lead">Gracias por iniciar sesión en nuestra aplicación de alerta de crimen.</p>
                        <hr class="my-4">
                        <p>Aquí puedes comenzar a reportar y visualizar los delitos en tu área.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Empezar</a>
                    </div>

                    <!-- Sección de Últimas Actividades -->
                    <div class="card mt-4">
                        <div class="card-header">Últimas Actividades</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Actividad 1</li>
                                <li class="list-group-item">Actividad 2</li>
                                <li class="list-group-item">Actividad 3</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Sección de Notificaciones -->
                    <div class="card mt-4">
                        <div class="card-header">Notificaciones</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">Nueva notificación</li>
                                <li class="list-group-item">Otra notificación</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
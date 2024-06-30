@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="jumbotron text-center">
                        <h1 class="d-flex justify-content-center align-items-center">¡Bienvenido!</h1>
                        <p>Aquí puedes comenzar a reportar los delitos en tu área.</p>
                        <div class="text-center my-4">
                            <a href="/formularioReporte" class="btn btn-danger rounded-circle d-inline-flex align-items-center justify-content-center p-5" style="width: 250px; height: 250px;">
                                <span style="font-size: 1.5rem;">Nuevo reporte</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
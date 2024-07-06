@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <a href="/tipodelitos" class="btn btn-secondary mb-3">Retroceder</a>
            <div class="card">
                <div class="card-header">Registrar Nuevo Tipo de Delito</div>

                <div class="card-body">
                    <form method="POST" action="/tipodelitos">
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre del Delito</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" name="descripcion" class="form-control" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
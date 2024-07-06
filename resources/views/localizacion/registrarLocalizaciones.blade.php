@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <a href="/localizacions" class="btn btn-secondary mb-3">Retroceder</a>
            <div class="card">
                <div class="card-header">Registrar nueva Dirección</div>

                <div class="card-body">
                    <form method="POST" action="/localizacions">
                        @csrf

                        <div class="form-group">
                            <label for="direccion">Nombre del dirección</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" required>
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
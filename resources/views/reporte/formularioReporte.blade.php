@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Reporte</div>

                <div class="card-body">
                    <a href="{{ route('home') }}" class="btn btn-secondary mb-3">Retroceder</a>

                    <form method="POST" action="{{ route('reportes.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo" autofocus>
                            @error('titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" required>{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tipos_delitos_id">Tipo de Delito</label>
                            <select id="tipos_delitos_id" class="form-control @error('tipos_delitos_id') is-invalid @enderror" name="tipos_delitos_id" required>
                                <option value="">Seleccionar Tipo de Delito</option>
                                <option value="1">Robo</option>
                                <option value="2">Asalto</option>
                                <option value="3">Homicidio</option>
                            </select>
                            @error('tipos_delitos_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ubicacion_id">Ubicación</label>
                            <select id="ubicacion_id" class="form-control @error('ubicacion_id') is-invalid @enderror" name="ubicacion_id" required>
                                <option value="">Seleccionar Ubicación</option>
                                <option value="1">Lima</option>
                                <option value="2">Arequipa</option>
                                <option value="3">Trujillo</option>
                            </select>
                            @error('ubicacion_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imagen">Subir Imagen</label>
                            <input id="imagen" type="file" class="form-control-file @error('imagen') is-invalid @enderror" name="imagen" required>
                            @error('imagen')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Crear Reporte
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

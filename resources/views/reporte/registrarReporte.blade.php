@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Reporte</div>

                <div class="card-body">
                    <a href="/" class="btn btn-secondary mb-3">Retroceder</a>

                    <form method="POST" action="/reportes" enctype="multipart/form-data">
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
                            <label for="tipo_delito_id">Tipo de Delito</label>
                            <select id="tipo_delito_id" class="form-control @error('tipo_delito_id') is-invalid @enderror" name="tipo_delito_id" required>
                                <option value="">Seleccionar Tipo de Delito</option>
                                @foreach($tiposDeReportes as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>
                            @error('tipo_delito_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ubicacion_id">Ubicación</label>
                            <select id="ubicacion_id" class="form-control @error('ubicacion_id') is-invalid @enderror" name="ubicacion_id" required>
                                <option value="">Seleccionar Ubicación</option>
                                @foreach($localizaciones as $localizacion)
                                <option value="{{ $localizacion->id }}">{{ $localizacion->direccion }}</option>
                                @endforeach
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h2>Direcciones</h2>
        </div>
        <div class="col text-end">
            <a href="/registrarlocalizacions" class="btn btn-primary">Agregar</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($localizaciones as $localizacion)
                <tr>
                    <td>{{ $localizacion->direccion }}</td>
                    <td>{{ $localizacion->descripcion }}</td>
                    <td>
                        <a href="/editarlocalizacions/{{ $localizacion->id }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="/localizacions/{{ $localizacion->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta Dirección?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
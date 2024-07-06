@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h2>Tipos de delitos</h2>
        </div>
        <div class="col text-end">
            <a href="/registrartipodelitos" class="btn btn-primary">Agregar</a>
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
                @foreach ($tiposDelitos as $tipoDelito)
                <tr>
                    <td>{{ $tipoDelito->nombre }}</td>
                    <td>{{ $tipoDelito->descripcion }}</td>
                    <td>
                        <a href="/editartipodelitos/{{ $tipoDelito->id }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="/tipodelitos/{{ $tipoDelito->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de delito?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
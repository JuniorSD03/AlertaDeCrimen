@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h2>Comentarios</h2>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre de usuario</th>
                    <th>Comentario</th>
                    <th>Titulo de reporte</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comentarios as $comentario)
                <tr>
                    <td>{{ $comentario->user_name }}</td>
                    <td>{{ $comentario->descripcion }}</td>
                    <td>{{ $comentario->reporte_titulo }}</td>
                    <td>
                        <form action="/comentarios/{{ $comentario->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este Comentario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
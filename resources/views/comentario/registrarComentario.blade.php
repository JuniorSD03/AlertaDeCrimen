@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/verReporte" class="btn btn-primary">
        Retroceder
    </a>
    <h2>Dejar Comentarios</h2>
    <form action="#" method="POST">
        @csrf
        <div class="form-group">
            <label for="comments">Comentarios</label>
            <textarea id="comments" name="comments" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Comentarios</button>
    </form>
</div>
@endsection
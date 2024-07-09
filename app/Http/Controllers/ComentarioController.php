<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notificacion;

class ComentarioController extends Controller
{
    public function index()
    {
        if ($this->verificarRol()) {
            $comentarios = Comentario::join('users', 'comentarios.users_id', '=', 'users.id')
                ->join('reportes', 'comentarios.reportes_id', '=', 'reportes.id')
                ->select('comentarios.*', 'users.name as user_name', 'reportes.titulo as reporte_titulo')
                ->orderBy('comentarios.id', 'desc')
                ->get();

            return view('comentario.verComentarios', compact('comentarios'));
        }

        return redirect('/');
    }

    public function create()
    {
        if ($this->verificarRol()) {
            return view('comentario.registrarComentarios');
        }

        return redirect('/');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'reporte_id' => 'required|exists:reportes,id'
        ]);

        $comentario = new Comentario;
        $comentario->descripcion = $request->descripcion;
        $comentario->users_id = auth()->id();
        $comentario->reportes_id = $request->reporte_id;
        $comentario->save();

        return redirect(route('reportes.show', $request->reporte_id));
    }

    public function show(Comentario $comentarios)
    {
        return view('tipos_delitos.show', compact('comentarios'));
    }

    public function destroy($id)
    {
        $comentarios = Comentario::find($id);

        $userId = $comentarios->users_id;
        $descripcion = $comentarios->descripcion;
        $reportes_id = $comentarios->reportes_id;

        #Creación de la notificación
        $notificaciones = new Notificacion();
        $notificaciones->mensaje = "Se eliminó tu comentario: " . $descripcion;
        $notificaciones->users_id = $userId;
        $notificaciones->save();

        $comentarios->delete();
        return redirect(route('reportes.show', $reportes_id));
    }

    public function verificarRol()
    {
        return Auth::user()->rol === 'administrador';
    }
}

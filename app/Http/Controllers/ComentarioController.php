<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'direccion' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $comentarios = new Comentario();
        $comentarios->direccion = $request->direccion;
        $comentarios->descripcion = $request->descripcion;
        $comentarios->save();

        return redirect(route('localizacions.index'));
    }

    public function show(Comentario $comentarios)
    {
        return view('tipos_delitos.show', compact('comentarios'));
    }

    public function edit($id)
    {
        if ($this->verificarRol()) {
            $comentarios = Comentario::find($id);

            return view('comentario.editarComentarios', compact('comentarios'));
        }

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $comentarios = Comentario::find($id);

        $comentarios->direccion = $request->direccion;
        $comentarios->descripcion = $request->descripcion;
        $comentarios->save();

        return redirect(route('localizacions.index'));
    }

    public function destroy($id)
    {
        $comentarios = Comentario::find($id);
        $comentarios->delete();
        return redirect(route('localizacions.index'));
    }

    public function verificarRol()
    {
        return Auth::user()->rol === 'administrador';
    }
}

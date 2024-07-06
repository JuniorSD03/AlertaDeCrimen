<?php

namespace App\Http\Controllers;

use App\Models\TipoDelito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TipoDelitoController extends Controller
{
    public function index()
    {
        if ($this->verificarRol()) {
            $tiposDelitos = TipoDelito::orderBy('id', 'desc')->get();
            return view('tipodelito.verTiposDeDelitos', compact('tiposDelitos'));
        }

        return redirect('/');
    }

    public function create()
    {
        if ($this->verificarRol()) {
            return view('tipodelito.registrarTiposDeDelitos');
        }

        return redirect('/');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $tipoDelito = new TipoDelito();
        $tipoDelito->nombre = $request->nombre;
        $tipoDelito->descripcion = $request->descripcion;
        $tipoDelito->save();

        return redirect(route('tipodelitos.index'));
    }

    public function show(TipoDelito $tipoDelito)
    {
        return view('tipos_delitos.show', compact('tipoDelito'));
    }

    public function edit($id)
    {
        if ($this->verificarRol()) {
            $tipoDelito = TipoDelito::find($id);

            return view('tipodelito.editarTiposDeDelitos', compact('tipoDelito'));
        }

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $tipoDelito = TipoDelito::find($id);

        $tipoDelito->nombre = $request->nombre;
        $tipoDelito->descripcion = $request->descripcion;
        $tipoDelito->save();

        return redirect(route('tipodelitos.index'));
    }

    public function destroy($id)
    {
        $tipoDelito = TipoDelito::find($id);
        $tipoDelito->delete();
        return redirect(route('tipodelitos.index'));
    }

    public function verificarRol()
    {
        return Auth::user()->rol === 'administrador';
    }
}

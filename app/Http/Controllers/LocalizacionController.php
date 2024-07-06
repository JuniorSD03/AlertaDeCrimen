<?php

namespace App\Http\Controllers;

use App\Models\Localizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocalizacionController extends Controller
{
    public function index()
    {
        if ($this->verificarRol()) {
            $localizaciones = Localizacion::orderBy('id', 'desc')->get();
            return view('localizacion.verLocalizaciones', compact('localizaciones'));
        }

        return redirect('/');
    }

    public function create()
    {
        if ($this->verificarRol()) {
            return view('localizacion.registrarLocalizaciones');
        }

        return redirect('/');
    }

    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $localizaciones = new Localizacion();
        $localizaciones->direccion = $request->direccion;
        $localizaciones->descripcion = $request->descripcion;
        $localizaciones->save();

        return redirect(route('localizacions.index'));
    }

    public function show(Localizacion $localizaciones)
    {
        return view('tipos_delitos.show', compact('localizaciones'));
    }

    public function edit($id)
    {
        if ($this->verificarRol()) {
            $localizaciones = Localizacion::find($id);

            return view('localizacion.editarLocalizaciones', compact('localizaciones'));
        }

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'direccion' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $localizaciones = Localizacion::find($id);

        $localizaciones->direccion = $request->direccion;
        $localizaciones->descripcion = $request->descripcion;
        $localizaciones->save();

        return redirect(route('localizacions.index'));
    }

    public function destroy($id)
    {
        $localizaciones = Localizacion::find($id);
        $localizaciones->delete();
        return redirect(route('localizacions.index'));
    }

    public function verificarRol()
    {
        return Auth::user()->rol === 'administrador';
    }
}

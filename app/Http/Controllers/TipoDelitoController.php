<?php

namespace App\Http\Controllers;

use App\Models\TipoDelito;
use Illuminate\Http\Request;

class TipoDelitoController extends Controller
{
    public function index()
    {
        $tiposDelitos = TipoDelito::all();
        return view('tipos_delitos.index', compact('tiposDelitos'));
    }

    public function create()
    {
        return view('tipos_delitos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        TipoDelito::create($request->all());

        return redirect()->route('tipos-delitos.index')
            ->with('success', 'Tipo de delito creado correctamente.');
    }

    public function show(TipoDelito $tipoDelito)
    {
        return view('tipos_delitos.show', compact('tipoDelito'));
    }

    public function edit(TipoDelito $tipoDelito)
    {
        return view('tipos_delitos.edit', compact('tipoDelito'));
    }

    public function update(Request $request, TipoDelito $tipoDelito)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $tipoDelito->update($request->all());

        return redirect()->route('tipos-delitos.index')
            ->with('success', 'Tipo de delito actualizado correctamente.');
    }

    public function destroy(TipoDelito $tipoDelito)
    {
        $tipoDelito->delete();

        return redirect()->route('tipos-delitos.index')
            ->with('success', 'Tipo de delito eliminado correctamente.');
    }
}

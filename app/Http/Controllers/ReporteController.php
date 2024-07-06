<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\TipoDelito;
use App\Models\Localizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::join('tipo_delitos', 'reportes.tipos_delitos_id', '=', 'tipo_delitos.id')
            ->join('localizacions', 'reportes.localizacions_id', '=', 'localizacions.id')
            ->join('users', 'reportes.users_id', '=', 'users.id')
            ->select('reportes.*', 'tipo_delitos.nombre as tipo_delito_nombre', 'localizacions.direccion as localizacion_nombre', 'users.name as user_name')
            ->orderBy('reportes.id', 'desc')
            ->get();

        return view('reporte.reportes', compact('reportes'));
    }

    public function create()
    {
        $tiposDeReportes = TipoDelito::all();
        $localizaciones = Localizacion::all();
        return view('reporte.registrarReporte', compact('tiposDeReportes', 'localizaciones'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo_delito_id' => 'required|exists:tipo_delitos,id',
            'ubicacion_id' => 'required|exists:localizacions,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('imagen')) {
            $imageName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('imagen'), $imageName);
        } else {
            $imageName = null;
        }

        $reporte = new Reporte;
        $reporte->titulo = $request->titulo;
        $reporte->descripcion = $request->descripcion;
        $reporte->users_id = auth()->id();
        $reporte->tipos_delitos_id = $request->tipo_delito_id;
        $reporte->localizacions_id = $request->ubicacion_id;
        $reporte->imagen = $imageName;
        $reporte->save();

        return redirect(route('reportes.index'));
    }

    public function show($id)
    {
        $reporte = Reporte::join('tipo_delitos', 'reportes.tipos_delitos_id', '=', 'tipo_delitos.id')
            ->join('localizacions', 'reportes.localizacions_id', '=', 'localizacions.id')
            ->join('users', 'reportes.users_id', '=', 'users.id')
            ->select('reportes.*', 'tipo_delitos.nombre as tipo_delito_nombre', 'localizacions.direccion as localizacion_nombre', 'users.name as user_name')
            ->where('reportes.id', $id)
            ->first();

        return view('reporte.verReporte', compact('reporte'));
    }

    public function edit($id)
    {
        $reporte = Reporte::find($id);

        return view('reporte.editarReportes', compact('reporte'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $reporte = Reporte::find($id);

        $reporte->nombre = $request->nombre;
        $reporte->descripcion = $request->descripcion;
        $reporte->save();

        return redirect(route('reportes.index'));
    }

    public function destroy($id)
    {
        $reporte = Reporte::find($id);
        $reporte->delete();
        return redirect(route('reportes.index'));
    }

    public function verificarRol()
    {
        return Auth::user()->rol === 'administrador';
    }
}

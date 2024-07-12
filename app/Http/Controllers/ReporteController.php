<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use App\Models\TipoDelito;
use App\Models\Localizacion;
use Illuminate\Http\Request;
use App\Models\Comentario;
use App\Models\Notificacion;

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

    public function buscar(Request $request)
    {
        $titulo = $request->titulo;
        $reportes = Reporte::join('tipo_delitos', 'reportes.tipos_delitos_id', '=', 'tipo_delitos.id')
            ->join('localizacions', 'reportes.localizacions_id', '=', 'localizacions.id')
            ->join('users', 'reportes.users_id', '=', 'users.id')
            ->select('reportes.*', 'tipo_delitos.nombre as tipo_delito_nombre', 'localizacions.direccion as localizacion_nombre', 'users.name as user_name')
            ->where('reportes.titulo', 'like', '%' . $titulo . '%')
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
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo_delito_id' => 'required|exists:tipo_delitos,id',
            'ubicacion_id' => 'required|exists:localizacions,id',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = time() . '.' . $request->imagen->extension();
        $request->imagen->move(public_path('imagen'), $imageName);

        $reporte = new Reporte;
        $reporte->titulo = $request->titulo;
        $reporte->descripcion = $request->descripcion;
        $reporte->users_id = auth()->id();
        $reporte->tipos_delitos_id = $request->tipo_delito_id;
        $reporte->localizacions_id = $request->ubicacion_id;
        $reporte->imagen = $imageName;
        $reporte->save();

        #Creación de la notificación
        $notificaciones = new Notificacion();
        $notificaciones->mensaje = "Reporte creado de forma exitosa";
        $notificaciones->users_id = auth()->id();
        $notificaciones->save();

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

        $comentarios = Comentario::join('users', 'comentarios.users_id', '=', 'users.id')
            ->select('comentarios.*', 'users.name as user_name')
            ->where('comentarios.reportes_id', $id)
            ->orderBy('comentarios.id', 'desc')
            ->get();

        return view('reporte.verReporte', compact('reporte', 'comentarios'));
    }

    public function destroy($id)
    {
        $reporte = Reporte::find($id);
        $imagePath = public_path('imagen') . '/' . $reporte->imagen;

        if (file_exists($imagePath)) {
            @unlink($imagePath);
        }

        $userId = $reporte->users_id;
        $titulo = $reporte->titulo;

        #Creación de la notificación
        $notificaciones = new Notificacion();
        $notificaciones->mensaje = "Se eliminó tu reporte: " . $titulo;
        $notificaciones->users_id = $userId;
        $notificaciones->save();

        $reporte->delete();

        return redirect(route('reportes.index'));
    }
}

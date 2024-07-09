<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $notificaciones = Notificacion::where('notificacions.users_id', $userId)
            ->orderBy('notificacions.id', 'desc')
            ->get();

        return view('notificacion.notificaciones', compact('notificaciones'));
    }

    public function destroy($id)
    {
        $notificaciones = Notificacion::find($id);
        $notificaciones->delete();
        return redirect(route('notificacions.index'));
    }
}

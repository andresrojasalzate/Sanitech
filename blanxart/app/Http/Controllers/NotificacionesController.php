<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    public function notificaciones()
    {

        $notificaciones = Notificacion::where('user_id', 26)
            ->join('citas', 'citas.id', '=', 'notificacions.cita_id')
            ->select('notificacions.title', 'notificacions.affair', 'notificacions.descripcion', 'notificacions.tipo', 'notificacions.created_at')
            ->orderBy('notificacions.created_at', 'desc')
            ->get()->toJson();
        // dd($notificaciones);

        return view('pages.notificaciones', compact('notificaciones'));
    }
}

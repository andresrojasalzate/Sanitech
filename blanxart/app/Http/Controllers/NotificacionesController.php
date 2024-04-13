<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    public function notificaciones()
    {

        $notificaciones = Notificacion::where('user_id', 26)
            ->join('citas', 'citas.id', '=', 'notificacions.cita_id')
            ->select('notificacions.cita_id', 'notificacions.title', 'citas.accepted', 'notificacions.affair', 'notificacions.descripcion', 'notificacions.tipo', 'notificacions.created_at')
            ->orderBy('notificacions.created_at', 'desc')
            ->get()->toJson();
        // dd($notificaciones);

        return view('pages.notificaciones', compact('notificaciones'));
    }

    public function respuestaCita($id, $respuesta)
    {

        $cita = Cita::find($id); 

       

        $cita->accepted = $respuesta; 

        $cita->save();

        return redirect()->back();
    }
}

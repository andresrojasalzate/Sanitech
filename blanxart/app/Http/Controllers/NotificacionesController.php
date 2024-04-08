<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    public function notificaciones()
    {

        $notificaciones = Notificacion::where('user_id', 26)
            ->orderBy('created_at', 'desc') 
            ->get()
            ->toJson();
        return view('pages.notificaciones', compact('notificaciones'));
    }
}

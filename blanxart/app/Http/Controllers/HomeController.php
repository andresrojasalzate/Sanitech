<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paciente;
use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {

        if (Auth::check()) {
            // Obtiene el ID del usuario autenticado
            $id = Auth::user()->id;
            $paciente_id = Paciente::where('user_id', $id)->value('id');
            $notificaciones = Notificacion::where('paciente_id', $paciente_id)
                ->join('citas', 'citas.id', '=', 'notificacions.cita_id')
                ->select(DB::raw('COUNT(*) as cantidad'))
                ->where('notificacions.vista', '=', false)
                ->first();
                

            return view('pages.home', ['notificaciones' => $notificaciones]);
        }
        
        

        
    }
}

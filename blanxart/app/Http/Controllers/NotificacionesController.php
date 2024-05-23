<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\NotificacionPaciente;

class NotificacionesController extends Controller
{
    public function notificaciones($id)
    {

        $paciente_id = Paciente::where('user_id', $id)->value('id');
        $notificacionesCita = Notificacion::where('paciente_id', $paciente_id)
            ->join('citas', 'citas.id', '=', 'notificacions.cita_id')
            ->select('notificacions.id', 'notificacions.cita_id', 'notificacions.title', 'citas.accepted', 'notificacions.descripcion', 'notificacions.tipo', 'notificacions.created_at', 'notificacions.vista')
            ->orderBy('notificacions.created_at', 'desc')
            ->get();
        $notificacionesCitaPaciente = DB::table('notificacion_pacientes')
            ->get();



        $notificaciones = [];
        $id = 1;
        foreach ($notificacionesCita as $notificacion) {

            $notificaciones[] = [
                'id' => $id,
                'cita_id' => $notificacion->cita_id,
                'title' => $notificacion->title,
                'accepted' => $notificacion->accepted,
                'descripcion' => $notificacion->descripcion,
                'tipo' => $notificacion->tipo,
                'created_at' => $notificacion->created_at,
                'vista' => $notificacion->vista,
            ];
            $notificacion = Notificacion::find($notificacion->id);
            $notificacion->vista = true;
            $notificacion->save();

            $id++;
        }

        foreach ($notificacionesCitaPaciente as $notificacion) {
            $notificaciones[] = [
                'id' => $id,
                'cita_id' => null,
                'title' => $notificacion->title,
                'accepted' => null,
                'descripcion' => $notificacion->descripcion,
                'tipo' => $notificacion->tipo,
                'created_at' => $notificacion->created_at,
                'vista' => $notificacion->vista,
            ];
            $notificacion = NotificacionPaciente::find($notificacion->id);
            $notificacion->vista = true;
            $notificacion->save();

            $id++;
        }

        
        usort($notificaciones, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });

        
        // $notificaciones = $notificaciones->toJson();

        $notificaciones = json_encode($notificaciones);

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

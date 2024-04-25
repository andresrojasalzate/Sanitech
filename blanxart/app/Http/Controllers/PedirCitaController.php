<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PedirCitaController extends Controller
{
    public function show(string $idUsuarioPaciente)
    {
        $paciente = Paciente::find($idUsuarioPaciente);
        // dd($paciente);
        $diasNoDisponibles = Cita::getDiasNoDisponibles(8);
        return view('pages.pedirCita', [
            'paciente' => $paciente,
            'diasNoDisponibles' => $diasNoDisponibles
        ]);
    }

    public function store(Request $request)
    {
    }

    public function asignarFechaCita()
    {

        $citas = Cita::getCitasSinAsignar();
        // dd($citas);

        return view('pages.asignarFechaCita', ['citas' => $citas]);
    }

    public function agendarCita($id)
    {
        $medicos = Medico::with('user')->get()->toJson();

        return view('pages.agendarCita', ['cita_id' => $id, 'medicos' => $medicos]);
    }

    public function actualizarCita(Request $request, $id)
    {

        $medicoId = $request->input('medico');
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $descripcion = $request->input('descripcion');
        // dd($medicoId);

        $citaExistente = Cita::where('medico_id', $medicoId)
            ->where('date', $fecha)
            ->where('time', $hora)
            ->where('id', '!=', $id)
            ->exists();

        if ($citaExistente) {
            return Redirect::back()->withErrors(['error' => 'Ya existe una cita para este médico en la misma fecha y hora.']);
        }

        $cita = Cita::findOrFail($id);
        $cita->medico_id = $medicoId;
        $cita->date = $fecha;
        $cita->time = $hora;
        $cita->save();


        $fechaFormateada = date('d F Y', strtotime($fecha));

        $notificacion = new Notificacion();
        $notificacion->title = 'Cita dia ' .$fechaFormateada;
        $notificacion->descripcion = $descripcion; 
        $notificacion->tipo = 'Confirmacion';
        $notificacion->cita_id = $id; 
        $notificacion->save();

        return redirect()->route('asignarFechaCita');
    }
}

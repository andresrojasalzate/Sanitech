<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Notificacion;
use Illuminate\Http\Request;
use App\Http\Requests\CitaRequest;
use Illuminate\Support\Facades\Redirect;

class PedirCitaController extends Controller
{

    //Función que devuelve la vista del formulario para pedir cita del paciente
    public function pedirCita(string $idUsuarioPaciente)
    {
        $paciente = Paciente::find($idUsuarioPaciente);
        $diasNoDisponibles = Cita::getDiasNoDisponibles(8);
        $horasDisponibles = Cita::getHorasDisponibles(8, '2024-05-14');

        return view('pages.pedirCita', [
            'paciente' => $paciente,
            'diasNoDisponibles' => $diasNoDisponibles,
            'horasDisponibles' => $horasDisponibles
        ]);
    }

    //Función que devuelve la vista para asignar una fecha a una cita del médico
    public function asignarFechaCita()
    {
        $citas = Cita::getCitasSinAsignar();
        return view('pages.asignarFechaCita', ['citas' => $citas]);
    }

    //Función que devuelve la vista para agendar una cita del administrador
    public function agendarCita($id, $ruta)
    {
        $medicos = Medico::with('user')->get()->toJson();
        return view('pages.agendarCita', ['cita_id' => $id, 'medicos' => $medicos, 'ruta' => $ruta]);
    }

    //Función que devuelve la vista para reprogramar una cita del administrador
    public function reprogramarCita()
    {
        $citas = Cita::getCitasRechazadas();
        return view('pages.reprogramarCita', ['citas' => $citas]);
    }

    //Función que devuelve la vista de tareas de un administrador.
    public function tareas()
    {
        return view('pages.tareas');
    }

    //Función store para crear una petición de una cita del paciente
    public function publicarPeticionCita(Request $request)
    {
        Cita::create([
            'prueba_id' => null,
            'date' => $request->input('fecha'),
            'time' => $request->input('hora'),
            'reason' => $request->input('descripcion'),
            'emergency_level' => null,
            'done' => false,
            'accepted' => true,
            'paciente_id' => $request->input('paciente_id')
        ]);

        return redirect()->route('home');
    }

    //Función update que actualiza una cita ya creada
    public function actualizarCita(Request $request, $id, $ruta)
    {
        $medicoId = $request->input('medico');
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');
        $descripcion = $request->input('descripcion');

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
        $notificacion->title = 'Cita dia ' . $fechaFormateada;
        $notificacion->descripcion = $descripcion;
        $notificacion->tipo = 'Confirmacion';
        $notificacion->cita_id = $id;
        $notificacion->save();

        return redirect()->route($ruta);
    }
}

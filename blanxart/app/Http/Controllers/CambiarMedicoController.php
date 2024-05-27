<?php

namespace App\Http\Controllers;

use App\Models\CambioMedico;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CambiarMedicoRequest;
use App\Http\Requests\SolucionCambioMedicoRequest;
use App\Models\Medico;
use App\Models\NotificacionPaciente;

class CambiarMedicoController extends Controller
{
    public function show()
    {
        $usuarioPaciente = Auth::user();
        $idPaciente = $usuarioPaciente->paciente->id;

        if (CambioMedico::where('paciente_id', $idPaciente)->exists()) {
            return redirect()->route('solicitudes');
        } else {

            return view('pages.cambioMedico', [
                'idPaciente' => $idPaciente,
            ]);
        }
    }

    public function store(CambiarMedicoRequest $request)
    {
        $data = $request->validated();
        CambioMedico::create($data);

        return  redirect()->route('solicitudes')->with('status', 'Sol·licitud enviada correctament!');
    }

    public function allRequests()
    {


        $lista = DB::table('cambio_medicos')
            ->join('pacientes', 'pacientes.id', '=', 'cambio_medicos.paciente_id')
            ->join('users', 'users.id', '=', 'pacientes.user_id')
            ->select('pacientes.id', 'users.name', 'users.lastName', 'pacientes.genre', 'pacientes.birth_date', 'users.dni', 'pacientes.CIP')
            ->get();



        return view('pages.listaCambioMedico', ['lista' => $lista]);
    }

    public function showAdmin($idPaciente)
    {


        $paciente = Paciente::find($idPaciente);
        $medicoDelPaciente = $paciente->medico;
        $nombreMedico = $medicoDelPaciente->user->name . " " . $medicoDelPaciente->user->lastName;
        $motivoPaciente = CambioMedico::where('paciente_id', $idPaciente)->first()->reason;

        $medicos = Medico::whereNot('id', $medicoDelPaciente->id)->with('user')->get();

        return view('pages.cambioMedicoAdmin', [
            'paciente' => $paciente,
            'medicoActual' => $nombreMedico,
            'motivoPaciente' => $motivoPaciente,
            'medicos' => $medicos,
            'idPaciente' => $idPaciente
        ]);
    }

    public function solucionPeticionCambioMedico(SolucionCambioMedicoRequest $request)
    {

        $data = $request->validated();

        $paciente = Paciente::find($data['idPaciente']);
        if ($data['action'] === "acceptar") {
            $paciente->medico_id = $data['nuevoMedico'];
            $paciente->save();
            $this->crearNotificacionAceptada($data['nuevoMedico'], $paciente->id);
        } else {

            $this->crearNotificacionRechazada($paciente->id, $data['motivoRechazo']);
        }

        $this->borrarSolicitud($paciente->id);

        return redirect()->route('cambiarMedico')->with('status', 'Sol·licitud gestionada correctament!');
    }

    private function borrarSolicitud($idPaciente)
    {

        $solicitud = CambioMedico::where('paciente_id', $idPaciente)->first();
        $solicitud->delete();
    }

    private function crearNotificacionAceptada($idNuevoMedico, $idPaciente)
    {

        $medico = Medico::findOrFail($idNuevoMedico);
        $nombreMedico = $medico->user->name . " " . $medico->user->lastName;
        $tituloNotificacion = "La seva petició de canvi de metge ha estat acceptada";
        $mensajeNotificacion = "El seu nou metge assignat és: " . $nombreMedico;

        NotificacionPaciente::create([
            'title' => $tituloNotificacion,
            'descripcion' => $mensajeNotificacion,
            'tipo' => "Cambio",
            'vista' => false,
            'paciente_id' => $idPaciente
        ]);
    }

    private function crearNotificacionRechazada($idPaciente, $motivoRechazo)
    {
        $tituloNotificacion = "La seva petició de canvi de metge ha estat rebutjada";
        $mensajeNotificacion = "Motiu del rebuig: " . $motivoRechazo;

        NotificacionPaciente::create([
            'title' => $tituloNotificacion,
            'descripcion' => $mensajeNotificacion,
            'tipo' => "Cambio",
            'vista' => false,
            'paciente_id' => $idPaciente
        ]);
    }
}

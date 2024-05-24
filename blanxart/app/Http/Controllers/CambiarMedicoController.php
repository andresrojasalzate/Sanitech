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

class CambiarMedicoController extends Controller
{
    public function show()
    {
        $usuarioPaciente = Auth::user();
        $idPaciente = $usuarioPaciente->paciente->id;

        return view('pages.cambioMedico', [
            'idPaciente' => $idPaciente,
        ]);
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
            ->select('pacientes.id','users.name', 'users.lastName', 'pacientes.genre', 'pacientes.birth_date', 'users.dni', 'pacientes.CIP')
            ->get();



        return view('pages.listaCambioMedico', ['lista' => $lista]);
    }

    public function showAdmin($idPaciente) {

        
        $paciente = Paciente::find($idPaciente);
        $medicoDelPaciente = $paciente->medico;
        $nombreMedico = $medicoDelPaciente->user->name. " ". $medicoDelPaciente->user->lastName;
        $motivoPaciente = CambioMedico::where('paciente_id', $idPaciente)->first()->reason;

        $medicos = Medico::whereNot('id', $medicoDelPaciente->id)->with('user')->get();

        return view('pages.cambioMedicoAdmin', [
            'paciente' => $paciente,
            'medicoActual' => $nombreMedico,
            'motivoPaciente' => $motivoPaciente,
            'medicos' => $medicos 
        ]);
    }

    public function solucionPeticionCambioMedico(SolucionCambioMedicoRequest $request){
        
        $data = $request->validated();
        dd($data);
    }
}

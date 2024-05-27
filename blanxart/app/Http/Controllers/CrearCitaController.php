<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaRequest;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Prueba;
use Illuminate\Http\Request;

class CrearCitaController extends Controller
{
    public function show(string $idUsuario)
    {
        $idPaciente = Paciente::getPacientIdByUserId($idUsuario);
        $paciente = Paciente::find($idPaciente[0]->id);
        $pruebas = Prueba::all();
        return view('pages.crearCita', [
            'paciente' => $paciente,
            'pruebas' => $pruebas
        ]);
    }

    public function store(CitaRequest $request)
    {
        $data = $request->validated();
        $pruebaId = null;

        if (isset($data['prueba_id'])) {
            $pruebaId = $data['prueba_id'];
        }

        Cita::create([
            'prueba_id' => $pruebaId,
            'emergency_level' => $data['emergency_level'],
            'paciente_id' => $data['paciente_id'],
            'done' => false,
        ]);

        return redirect()->route('home')->with('status', 'Cita creada correctament!');
    }
}

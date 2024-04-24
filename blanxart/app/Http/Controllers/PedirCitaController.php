<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedirCitaRequest;
use App\Models\Cita;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PedirCitaController extends Controller
{
    public function show(string $idUsuarioPaciente) 
    {
        $paciente = Paciente::find($idUsuarioPaciente);
        // dd($paciente);
        $diasNoDisponibles = Cita::getDiasNoDisponibles(10);
        return view('pages.pedirCita', [
            'paciente' => $paciente,
            'diasNoDisponibles' => $diasNoDisponibles
        ]);
    }

    public function store (PedirCitaRequest $request) 
    {
        $data = $request->validated();

        Cita::create([
            'date' => $data['fecha'],
            'hour_entry' => $data['hour_entry'],
            'hour_departure' => null,
            'paciente_id' => $data['paciente_id'],
            'done' => false,

        ]);

        return redirect()->route('home');
    }

    public function asignarFechaCita() 
    {

        $citas = Cita::getCitasSinAsignar();
        // dd($citas);

        return view('pages.asignarFechaCita', ['citas' => $citas]);
    }
}

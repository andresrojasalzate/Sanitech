<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use Illuminate\Http\Request;

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
        return view('pages.agendarCita');
    }
}

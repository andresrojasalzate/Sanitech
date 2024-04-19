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
        $diasNoDisponibles = Cita::getDiasNoDisponibles(10);
        return view('pages.pedirCita', [
            'diasNoDisponibles' => $diasNoDisponibles,
            'paciente' => $paciente
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PedirCitaController extends Controller
{
    public function show(string $idUsuarioPaciente) 
    {
        $paciente = Paciente::find($idUsuarioPaciente);
        return view('pages.pedirCita', ['paciente' => $paciente]);
    }

    public function store() 
    {

    }
}

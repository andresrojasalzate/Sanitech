<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class SolicitudesController extends Controller
{
    public function solicitudes(string $idUsuarioPaciente) 
    {
        $paciente = Paciente::find($idUsuarioPaciente);
        return view('pages.solicitudes', ['paciente' => $paciente]);
    }
}
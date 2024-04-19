<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class PedirCitaController extends Controller
{
    public function show() 
    {
        $diasNoDisponibles = Cita::getDiasNoDisponibles(10);
        return view('pages.pedirCita', ['diasNoDisponibles' => $diasNoDisponibles]);
    }
}

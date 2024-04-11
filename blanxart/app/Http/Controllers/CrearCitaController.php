<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CrearCitaController extends Controller
{
    public function show()
    {
        return view('pages.crearCita');
    }

    public function filtrarPaciente(string $texto)
    {
        User::where();
    }
}

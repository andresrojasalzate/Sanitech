<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function agenda($id) 
    {
        $paciente_id = Paciente::where('user_id', $id)->value('id');
        $citas = Cita::getAllCitasByUserId($paciente_id);
         //dd($citas);
        return view('pages.agenda', compact('citas'));
    }
}

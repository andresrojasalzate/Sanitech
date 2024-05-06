<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Resultado;
use App\Models\Cita;
use Illuminate\Http\Request;

class InformeClinicosController extends Controller
{
    public function show($id)
    {
        //$paciente_id = Paciente::where('user_id', $id)->value('id');
        return view('pages.informesClinicos', [
           'resultados' =>  Resultado::where('paciente_id', $id)->paginate(10),
        ]);
    }
}

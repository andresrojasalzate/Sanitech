<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Resultado;
use App\Models\User;
use Illuminate\Http\Request;

class InformeClinicosController extends Controller
{
    public function show($id)
    {

        //$paciente_id = Paciente::where('id', $id)->value('id');
        return view('pages.informesClinicos', [
           'resultados' =>  Resultado::where('paciente_id', $id)->paginate(10),
        ]);
    }
}

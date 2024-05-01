<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use Illuminate\Http\Request;

class InformeClinicosController extends Controller
{
    public function show($id)
    {

        
        return view('pages.informesClinicos', [
           'resultados' =>  Resultado::where('paciente_id', $id)->paginate(10),
        ]);
    }
}

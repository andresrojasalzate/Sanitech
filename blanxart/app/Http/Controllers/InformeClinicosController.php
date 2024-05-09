<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class InformeClinicosController extends Controller
{
    public function show($id)
    {
        Log::info('Llamada al metodo InformesClinicosController.show id = '. $id);
        
        return view('pages.informesClinicos', [
        //    'resultados' =>  Resultado::where('paciente_id', $id)->paginate(10),
        'resultados' => Resultado::getMedicalResults($id)
        ]);
    }
}

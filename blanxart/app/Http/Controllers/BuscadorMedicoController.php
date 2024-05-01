<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BuscadorMedicoController extends Controller
{
    public function show(string $accion)
    {
        $medicos = Medico::getAllDoctors();

        // dd($medicos);

        return view('pages.buscadorMedico', [
            'medicos' => $medicos,
            'accion' => $accion,
            'apiKey' =>  env('API_KEY')
        ]);

    }

    public function filtrarMedico(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'textoIntroducido' => 'nullable'
        ]);

        if ($validator->fails()) {
           
            return response()->json(['errors' => $validator->errors()], 422);
        }
        
        $texto = $request->textoIntroducido;
        $textoNoEspacios = strtolower(trim($texto));
        $resultados = Medico::getDoctorByName($textoNoEspacios);

        return $resultados;
    }

    public function agendaMedico($id)
    {
        $citasXMedico = Medico::getAllMedicalAppointment($id);

        return view('pages.agendaMedico',['citasXMedico' => $citasXMedico]);

    }
}

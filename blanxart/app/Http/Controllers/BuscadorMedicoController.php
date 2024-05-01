<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Medico;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BuscadorMedicoController extends Controller
{
    public function show(string $accion)
    {
        try {
            Log::info('Llamada al metodo BuscadorMedicoController.show, accion = ' . $accion);

            $medicos = Medico::getAllDoctors();

            return view('pages.buscadorMedico', [
                'medicos' => $medicos,
                'accion' => $accion,
                'apiKey' =>  env('API_KEY')
            ]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function filtrarMedico(Request $request)
    {
        try {
            Log::info('Llamada al metodo BuscadorMedicoController.filtrarMedico');

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
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function agendaMedico($id)
    {
        try {

            Log::info('Llamada al metodo BuscadorMedicoController.agendaMedico id ='. $id);
            $citasXMedico = Medico::getAllMedicalAppointment($id);

            return view('pages.agendaMedico', ['citasXMedico' => $citasXMedico]);

        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CambiarMedicoRequest;
use App\Models\CambioMedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CambiarMedicoController extends Controller
{
    public function show()
    {
        $usuarioPaciente = Auth::user();
        $idPaciente = $usuarioPaciente->paciente->id;
       
        return view('pages.cambioMedico', [
            'idPaciente' => $idPaciente,
        ]);
    }

    public function store(CambiarMedicoRequest $request){
        $data = $request->validated();
        CambioMedico::create($data);

        return  redirect()->route('solicitudes')->with('status', 'Sol·licitud enviada correctament!');
    }
}

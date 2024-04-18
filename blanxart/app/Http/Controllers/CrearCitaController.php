<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaRequest;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Prueba;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrearCitaController extends Controller
{
    public function show(string $idUsuarioPaciente)
    {
        $paciente = Paciente::find($idUsuarioPaciente);
        $pruebas = Prueba::all();
        return view('pages.crearCita', [
            'paciente' => $paciente,
            'pruebas' => $pruebas
        ]);
    }

    public function store (CitaRequest $request)
    {
        $data = $request->validated();   
        $pruebaId = null;

        if(isset($data['prueba_id'])){
            $pruebaId = $data['prueba_id'];
        }

        $usuarioMedico = Auth::user();

        $idMedico = $usuarioMedico->medico->id;

        Cita::create([
            'prueba_id' => $pruebaId,
            'emergency_level' => $data['emergency_level'],
            'paciente_id' => $data['paciente_id'],
            'done' => false,
            'medico_id' => $idMedico
        ]);

        return redirect()->route('home');
    }

    public function filtrarPaciente(string $texto)
    {
        $textoNoEspacios = trim($texto);
        $resultados = User::where('rol', 'paciente')
            ->with('paciente')
            ->where(function ($query) use ($textoNoEspacios) {
                $query->where('name', 'like', '%' . $textoNoEspacios . '%')
                    ->orWhere('lastName', 'like', '%' . $textoNoEspacios . '%')
                    ->orWhereRaw('CONCAT(name, \' \' ,"lastName") = ?', [$textoNoEspacios]);
            })
            ->get();
        return $resultados;
    }
}

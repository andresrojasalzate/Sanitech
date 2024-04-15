<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaRequest;
use App\Models\Cita;
use App\Models\Prueba;
use App\Models\User;


use Illuminate\Http\Request;
use Termwind\Components\Dd;

class CrearCitaController extends Controller
{
    public function show(string $idUsuarioPaciente)
    {
        $paciente = User::find($idUsuarioPaciente);
        $pruebas = Prueba::all();
        return view('pages.crearCita', [
            'paciente' => $paciente,
            'pruebas' => $pruebas
        ]);
    }

    public function store (CitaRequest $request)
    {
        $data = $request->validated();

        Cita::create([
            'prueba_id' => $data['prueba_id'],
            'emergency_level' => $data['emergency_level'],
            'user_id' => $data['user_id'],
            'done' => false,
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

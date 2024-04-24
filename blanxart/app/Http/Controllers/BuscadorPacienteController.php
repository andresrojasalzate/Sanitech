<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuscadorPacienteController extends Controller
{
    public function show(string $accion)
    {
        $usuarioMedico = Auth::user();
        $idMedico = $usuarioMedico->medico->id;
        $pacientes = User::where('rol', 'paciente')
            ->with('paciente')
            ->whereHas('paciente', function ($query) use ($idMedico) {
                $query->where('medico_id', $idMedico);
            })->get();

        return view('pages.buscadorPaciente', [
            'pacientes' => $pacientes,
            'idMedico' => $idMedico,
            'accion' => $accion

        ]);
    }

    public function filtrarPaciente(string $texto, string $idMedico)
    {
        $textoNoEspacios = trim($texto);
        $resultados = User::where('rol', 'paciente')
            ->with('paciente')
            ->where(function ($query) use ($textoNoEspacios) {
                $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($textoNoEspacios) . '%'])
                    ->orWhereRaw('LOWER("lastName") LIKE ?', ['%' . strtolower($textoNoEspacios) . '%'])
                    ->orWhereRaw('CONCAT(LOWER(name), \' \' , LOWER("lastName")) = ?', [strtolower($textoNoEspacios)]);
            })
            ->whereHas('paciente', function ($query) use ($idMedico) {
                $query->where('medico_id', $idMedico);
            })
            ->get();

        return $resultados;
    }
}

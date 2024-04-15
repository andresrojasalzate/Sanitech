<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CrearCitaController extends Controller
{
    public function show()
    {
        return view('pages.crearCita');
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

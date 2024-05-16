<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class JustificanteController extends Controller
{
    public function justificante($id): View 
    {
        $paciente_id = Paciente::where('user_id', $id)->value('id');
        $citas = Cita::getAllCitasByUserId($paciente_id);
        // dd($citas);
        return view ('pages.justificante', compact('citas'));
    }

    public function generarJustificante($idCita) 
    {
        $user = Auth::user();
        $paciente_id = Paciente::where('user_id', $user->id)->value('id');
        $cita = Cita::fillPDF($paciente_id, $idCita);
        // dd($cita);
        $pdf = Pdf::loadView('templates.justificante',compact('cita'));
        return $pdf->download('justificant.pdf');
    }
}

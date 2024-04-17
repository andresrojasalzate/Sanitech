<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class JustificanteController extends Controller
{
    public function justificante(): View 
    {
        $userId = Auth::id();

        $citas = Cita::getAllCitasByUserId($userId);
        return view ('pages.justificante', compact('citas'));
    }

    public function generarJustificante() 
    {
        $userId = Auth::id();

        $cita = Cita::fillPDF($userId);
        $pdf = Pdf::loadView('templates.justificante',compact('cita'));
        return $pdf->stream('justificant.pdf');
    }
}

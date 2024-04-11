<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Cita;

class JustificanteController extends Controller
{
    public function justificante(): View 
    {
        $citas = Cita::getAllCitasByUserId();
        return view ('pages.justificante', compact('citas'));
    }

    public function generarJustificante() 
    {
        $pdf = Pdf::loadView('templates.generarJustificante');
        return $pdf->download('invoice.pdf');
    }
}

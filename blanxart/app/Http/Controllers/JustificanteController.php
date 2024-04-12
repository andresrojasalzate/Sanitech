<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class JustificanteController extends Controller
{
    public function generarJustificante() 
    {
        $cita = Cita::fillPDF();
        $pdf = Pdf::loadView('templates.justificante',compact('cita'));
        return $pdf->stream('justificant.pdf');
    }
}

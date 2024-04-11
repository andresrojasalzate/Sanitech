<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class JustificanteController extends Controller
{
    public function justificante(): View 
    {
        return view ('pages.justificante');
    }

    public function generarJustificante() 
    {
        $pdf = Pdf::loadView('templates.generarJustificante');
        return $pdf->stream('invoice.pdf');
    }
}

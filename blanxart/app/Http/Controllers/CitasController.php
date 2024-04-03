<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    public function citas() 
    {

        $citas = Cita::getAllCitasByUserId();
        // dd($citas);
        return view('pages.citas', compact('citas'));
    }

    
}

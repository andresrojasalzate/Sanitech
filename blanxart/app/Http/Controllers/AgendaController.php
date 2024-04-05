<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function agenda() 
    {

        $citas = Cita::getAllCitasByUserId();
        // dd($citas);
        return view('pages.agenda', compact('citas'));
    }

    
}

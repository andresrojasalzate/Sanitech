<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function agenda($id) 
    {

        $citas = Cita::getAllCitasByUserId($id);
        return view('pages.agenda', compact('citas'));
    }
}

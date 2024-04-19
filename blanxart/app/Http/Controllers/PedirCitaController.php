<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedirCitaController extends Controller
{
    public function pedirCita() 
    {
        return view('pages.pedirCita');
    }
}

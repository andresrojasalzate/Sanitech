<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class SolicitudesController extends Controller
{
    public function solicitudes() 
    {
        return view('pages.solicitudes');
    }
}
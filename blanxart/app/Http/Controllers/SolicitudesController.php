<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitudesController extends Controller
{
    public function solicitudes() 
    {
        return view('pages.solicitudes');
    }
}

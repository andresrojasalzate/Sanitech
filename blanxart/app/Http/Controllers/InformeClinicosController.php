<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class InformeClinicosController extends Controller
{
    public function show()
    {
        
        return view('pages.informesClinicos', [
           'citas' =>  Cita::where('user_id', 26)->with('prueba')->get(),
        ]);
    }
}

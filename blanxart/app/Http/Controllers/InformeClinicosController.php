<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformeClinicosController extends Controller
{
    public function show()
    {
        return view('pages.informesClinicos');
    }
}

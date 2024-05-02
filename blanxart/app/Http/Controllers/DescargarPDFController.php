<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class DescargarPDFController extends Controller
{
    public function descargar($nombreArchivo)
    {
        // Construye la ruta completa al archivo PDF
        $rutaArchivo = public_path('storage/documents/' . $nombreArchivo);

        // Verifica si el archivo existe
        if (file_exists($rutaArchivo)) {
            // Devuelve el archivo PDF para su descarga
            return Response::download($rutaArchivo);
        } else {
            // Si el archivo no existe, devuelve un error 404
            abort(404);
        }
    }
}

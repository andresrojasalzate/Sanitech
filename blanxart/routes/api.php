<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedirCitaController;
use App\Http\Controllers\BuscadorMedicoController;
use App\Http\Controllers\BuscadorPacienteController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/filtradorPaciente', [BuscadorPacienteController::class, 'filtrarPaciente'])->name('filtrarPaciente');
// Route::post('/filtradorMedico/',[BuscadorMedicoController::class, 'filtrarMedico']);
Route::middleware('auth:sanctum')->post('/filtradorMedico',[BuscadorMedicoController::class, 'filtrarMedico']);
Route::post('/consultarFecha',[PedirCitaController::class, 'consultarFecha']);
Route::post('/consultarFechaAsignar',[PedirCitaController::class, 'consultarFechaAsignar']);



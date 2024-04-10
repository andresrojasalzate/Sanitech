<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CitasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrearCitaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformeClinicosController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\SolicitudesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login-page');
})->name('index');

Route::get('/login',function(){
    return view('pages.login');
})->name('login-page');

Route::post('/custom-login', [AuthController::class, 'login'])->name('custom-login');

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/solicitudes', [SolicitudesController::class, 'solicitudes'])->name('solicitudes');
Route::get('/agenda', [AgendaController::class, 'agenda'])->name('agenda');
Route::get('/informesClinicos', [InformeClinicosController::class, 'show'])->name('informesClinicos');
Route::get('/notificaciones', [NotificacionesController::class, 'notificaciones'])->name('notificaciones');
Route::get('/crearCita', [CrearCitaController::class, 'show'])->name('crearCita');


Route::fallback(function(){
    return view('pages.error404');
});

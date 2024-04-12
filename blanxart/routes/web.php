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
use App\Http\Controllers\JustificanteController;


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
    return redirect()->route('login');
})->name('index');


//Ruta login
Route::get('/login', function () {
    return view('pages.login');
})->name('login');

Route::post('/sanitech', [AuthController::class, 'login'])->name('custom-login');

//---------------Rutas que necesitan autenticación de usuarios----------------------------------------

Route::group(['middleware' => 'auth'], function () {

    //Ruta 'home'
    Route::get('/home', function () {
        return view('pages.home');
    })->name('home');


    //ruta 'logout'
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');







    Route::group(['middleware' => ['rol:admin']], function () {
    });

    Route::group(['middleware' => ['rol:medico']], function () {
        Route::get('/crearCita', [CrearCitaController::class, 'show'])->name('crearCita');
    });

    Route::group(['middleware' => ['rol:paciente']], function () {
        Route::get('/notificaciones', [NotificacionesController::class, 'notificaciones'])->name('notificaciones');
        Route::get('/respuestaCita/{id}/{respuesta}', [NotificacionesController::class, 'respuestaCita'])->name('respuesta-cita');
        Route::get('/solicitudes', [SolicitudesController::class, 'solicitudes'])->name('solicitudes');
        Route::get('/agenda', [AgendaController::class, 'agenda'])->name('agenda');
        Route::get('/informesClinicos', [InformeClinicosController::class, 'show'])->name('informesClinicos');
        Route::get('/justificante', [JustificanteController::class, 'justificante'])->name('justificante');
        Route::get('/generarJustificante', [JustificanteController::class, 'generarJustificante'])->name('generarJustificante');
    });
});


Route::get('/prueba', function(){
    return view('templates.justificante');
})->name('prueba');

Route::get('/prueba/{id}',[JustificanteController::class,'generarJustificante'])->name('prueba1');


//Ruta por defecto ----> muestra pagina error 404
Route::fallback(function () {
    return view('pages.error404');
});

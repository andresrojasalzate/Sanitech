<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CrearCitaController;
use App\Http\Controllers\PedirCitaController;
use App\Http\Controllers\SolicitudesController;
use App\Http\Controllers\DescargarPDFController;
use App\Http\Controllers\JustificanteController;
use App\Http\Controllers\NotificacionesController;
use App\Http\Controllers\InformeClinicosController;
use App\Http\Controllers\BuscadorPacienteController;


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
        Route::get('/asignarFechaCita', [PedirCitaController::class, 'asignarFechaCita'])->name('asignarFechaCita');
        Route::get('/asignarFechaCita/cita/{id}', [PedirCitaController::class, 'agendarCita'])->name('agendarCita');
        Route::post('/actualizar-cita/{id}', [PedirCitaController::class, 'actualizarCita'])->name('cita.actualizar');

        
    });

    Route::group(['middleware' => ['rol:medico']], function () {
        Route::get('/crearCita/{idUsuarioPaciente}', [CrearCitaController::class, 'show'])->name('crearCita');
        Route::get('/resultadosPaciente/{id}', [InformeClinicosController::class, 'show'])->name('informesClinicos');
        Route::get('/buscadorPacientes/{accion}', [BuscadorPacienteController::class, 'show'])->name('buscadorPacientes');
        Route::post('/crearCita/store', [CrearCitaController::class, 'store'])->name('guardarCita');
        Route::get('/agendaPaciente/{id}', [AgendaController::class, 'agenda'])->name('agendaPaciente');
    });

    Route::group(['middleware' => ['rol:paciente']], function () {
        Route::get('/notificaciones/{id}', [NotificacionesController::class, 'notificaciones'])->name('notificaciones');
        Route::get('/respuestaCita/{id}/{respuesta}', [NotificacionesController::class, 'respuestaCita'])->name('respuesta-cita');
        Route::get('/solicitudes/', [SolicitudesController::class, 'solicitudes'])->name('solicitudes');
        Route::get('/agenda/{id}', [AgendaController::class, 'agenda'])->name('agenda');
        Route::get('/informesClinicos/{id}', [InformeClinicosController::class, 'show'])->name('informesClinicos');
        Route::get('/descargar-pdf/{nombreArchivo}', [DescargarPDFController::class, 'descargar']);

        //Generar un justificante
        Route::get('/justificante/{id}', [JustificanteController::class, 'justificante'])->name('justificante');
        Route::get('/generarJustificante/{idCita}', [JustificanteController::class, 'generarJustificante'])->name('generarJustificante');
        
        //Pedir una cita
        Route::get('/pedirCita/{id}', [PedirCitaController::class, 'show'])->name('pedirCita');
        Route::post('/pedirCita/store', [PedirCitaController::class, 'store'])->name('guardarPedirCita');
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

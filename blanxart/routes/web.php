<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CitasController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/solicitudes', [SolicitudesController::class, 'solicitudes'])->name('solicitudes');
Route::get('/agenda', [AgendaController::class, 'agenda'])->name('agenda');
Route::get('/notificaciones', [NotificacionesController::class, 'notificaciones'])->name('notificaciones');

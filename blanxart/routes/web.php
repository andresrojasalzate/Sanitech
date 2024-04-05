<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CitasController;
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

Route::get('/logados', function () {})->name('logados');

Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/solicitudes', [SolicitudesController::class, 'solicitudes'])->name('solicitudes');
Route::get('/citas', [CitasController::class, 'citas'])->name('citas');

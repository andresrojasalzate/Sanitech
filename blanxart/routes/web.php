<?php

use App\Http\Controllers\CitasController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::get('/header', function () {
    return view('layouts.example');
});

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/citas', [CitasController::class, 'citas'])->name('citas');

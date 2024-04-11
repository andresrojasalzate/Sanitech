@extends('layouts.master')

@section('title', 'Crear citas')
@section('descripcion_pagina', 'Crear cita per a un pacient')

@section('content')
<main class="crearCitaContainer">
    <section class="tituloCrearCita">
        <h1 class="medionegrita">Crear cita</h1>
    </section>

    <section class="contenidoCrearCita">
        <form action="" class="formularioCrearCita">
            <label for="nombrePaciente">Nom i cognoms del pacient:</label>
            <input type="text" name="nombrePaciente" list="pacientes">
            <datalist id="pacientes">
                <option>Volvo</option>
                <option>Saab</option>
                <option>Mercedes</option>
                <option>Audi</option>
            </datalist>
            <label for="nombrePaciente">Selecciona la prova per a la cita:</label>
            <select name="tipoPrueba" id="">
                <option value="opcion1">Opcion1</option>
                <option value="opcion1">Opcion2</option>
                <option value="opcion1">Opcion2</option>
            </select>
            <label for="nombrePaciente">Selecciona el nivel de emergencia:</label> 
            <div class="nivelEmergencia">
                <input type="radio" name="emergency_level" id="nivel1">
                <label for="nivel1">1</label>
                <input type="radio" name="emergency_level" id="nivel2">
                <label for="nivel2">2</label>
                <input type="radio" name="emergency_level" id="nivel3">
                <label for="nivel3">3</label>
                <input type="radio" name="emergency_level" id="nivel4">
                <label for="nivel4">4</label>
                <input type="radio" name="emergency_level" id="nivel5">
                <label for="nivel5">5</label>
            </div>
           <button>Crear Cita</button>
        </form> 
        
        
    </section>
    
</main>
@endsection
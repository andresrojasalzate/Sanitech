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
            <p class="medionegrita">Paciente: {{$paciente->name}} {{$paciente->lastName}}</p>
            <label for="nombrePaciente">Selecciona la prova per a la cita:</label>
            <select name="prueba_id" id="">
                <option value="" disabled selected>Escull una prova...</option>
                @foreach($pruebas as $prueba)
                    <option value="{{ $prueba->id }}">{{ $prueba->name }}</option>
                @endforeach
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
            <input type="hidden" name="user_id" value="{{ $paciente->id}}">
            <button>Crear Cita</button>
        </form>


    </section>

</main>
@endsection
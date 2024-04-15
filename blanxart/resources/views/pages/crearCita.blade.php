@extends('layouts.master')

@section('title', 'Crear citas')
@section('descripcion_pagina', 'Crear cita per a un pacient')

@section('content')
<main class="crearCitaContainer">
    <section class="tituloCrearCita">
        <h1 class="medionegrita">Crear cita</h1>
    </section>

    <section class="contenidoCrearCita">
        <form action="{{route('guardarCita')}}" class="formularioCrearCita" method="POST">
            @csrf 
            <p class="medionegrita">Paciente: {{$paciente->name}} {{$paciente->lastName}}</p>
            <label for="nombrePaciente">Selecciona la prova per a la cita:</label>
            @error('prueba_id')
                <p class="medionegrita errorCrearCita">{{ $message }}</p>
            @enderror
            <select name="prueba_id">
                <option value="" disabled selected>Escull una prova...</option>
                @foreach($pruebas as $prueba)
                    <option value="{{ $prueba->id }}">{{ $prueba->name }}</option>
                @endforeach
            </select>
            <label for="nombrePaciente">Selecciona el nivel de emergencia:</label>
            @error('emergency_level')
                <p class="medionegrita errorCrearCita">{{ $message }}</p>
            @enderror
            <div class="nivelEmergencia">
                <input type="radio" name="emergency_level" id="nivel1" value="1">
                <label for="nivel1">1</label>
                <input type="radio" name="emergency_level" id="nivel2" value="2">
                <label for="nivel2">2</label>
                <input type="radio" name="emergency_level" id="nivel3" value="3">
                <label for="nivel3">3</label>
                <input type="radio" name="emergency_level" id="nivel4" value="4">
                <label for="nivel4">4</label>
                <input type="radio" name="emergency_level" id="nivel5" value="5">
                <label for="nivel5">5</label>
            </div>
            <input type="hidden" name="user_id" value="{{ $paciente->id}}">
            <button>Crear Cita</button>
        </form>


    </section>

</main>
@endsection
@extends('layouts.master')

@section('title', 'Crear cites')
@section('descripcion_pagina', 'Crear cita per a un pacient')

@section('content')
    <main class="allform-container">
        <x-boton-atras :url="route('buscadorPacientes', ['accion' => 'crearCita'])" />

        <section class="tituloCrearCita">
            <h1 class="medionegrita">Crear cita</h1>
        </section>

        <section class="allform-container-content">
            <form action="{{ route('guardarCita') }}" id="formCrearCita" class="formularioCrearCita" method="POST">
                @csrf

                <div class="allform-container-content-datos-personales">
                    <h4>Dades del pacient</h4>
                    <div class="allform-container-content-datos-personales-usuario">
                        <p class="negrita">Nom</p>
                        <p>{{ $paciente->user->name }} {{ $paciente->user->lastName }}</p>
                    </div>
                    <hr>
                    <div class="allform-container-content-datos-personales-usuario">
                        <p class="negrita">DNI</p>
                        <p>{{ $paciente->user->dni }}</p>
                    </div>
                    <hr>
                    <div class="allform-container-content-datos-personales-usuario">
                        <p class="negrita">Telèfon</p>
                        <p>{{ $paciente->user->phone_number }}</p>
                    </div>
                </div>

                <seleccionPrueba-component :pruebas='@json($pruebas)' :errorTipo='@json($errors->first('citaPrueba'))'
                    :errorPrueba='@json($errors->first('prueba_id'))' :valorTipo='@json(old('citaPrueba'))'
                    :valorPrueba='@json(old('prueba_id'))'>
                </seleccionPrueba-component>

                <label for="nombrePaciente">Seleccioneu el nivell d'emergència:</label>
                @error('emergency_level')
                    <p class="medionegrita errorCrearCita">{{ $message }}</p>
                @enderror
                <div class="nivelEmergencia">
                    <input type="radio" name="emergency_level" id="nivel1" value="1" {{ old('emergency_level') == 1 ? 'checked' : '' }}>
                    <label for="nivel1" class="prioridad1">Nivell 1 (2-3 setmanes)</label>

                    <input type="radio" name="emergency_level" id="nivel2" value="2" {{ old('emergency_level') == 2 ? 'checked' : '' }}>
                    <label for="nivel2" class="prioridad2">Nivell 2 (3-4 setmanes)</label>

                    <input type="radio" name="emergency_level" id="nivel3" value="3" {{ old('emergency_level') == 3 ? 'checked' : '' }}>
                    <label for="nivel3" class="prioridad3">Nivell 3 (2-3 mesos)</label>

                    <input type="radio" name="emergency_level" id="nivel4" value="4" {{ old('emergency_level') == 4 ? 'checked' : '' }}>
                    <label for="nivel4" class="prioridad4">Nivell 4 (3 a 6 mesos)</label>

                    <input type="radio" name="emergency_level" id="nivel5" value="5" {{ old('emergency_level') == 5 ? 'checked' : '' }}>
                    <label for="nivel5" class="prioridad5">Nivell 5 (més de 6 mesos)</label>

                    <div class="nivelEmergencia-slider"></div>
                </div>

                <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                <button class="confirmar-btn">Crear Cita</button>
            </form>
        </section>
    </main>
@endsection

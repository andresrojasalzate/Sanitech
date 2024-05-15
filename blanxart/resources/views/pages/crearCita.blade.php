@extends('layouts.master')

@section('title', 'Crear cites')
@section('descripcion_pagina', 'Crear cita per a un pacient')

@section('content')
    
    <main class="allform-container">

        <x-boton-atras :url="route('buscadorPacientes',['accion' => 'agendaPaciente'])" />

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
                    @for ($i = 1; $i <= 5; $i++)
                        <input type="radio" name="emergency_level" id="nivel{{ $i }}"
                            value="{{ $i }}" {{ old('emergency_level') == $i ? 'checked' : '' }}>
                        <label for="nivel{{ $i }}">{{ $i }}</label>
                    @endfor
                </div>
                <input type="hidden" name="paciente_id" value="{{ $paciente->id }}">
                <button class="confirmar-btn">Crear Cita</button>
            </form>


        </section>

    </main>
@endsection

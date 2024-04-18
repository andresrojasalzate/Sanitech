@extends('layouts.master')

@section('title', 'Crear citas')
@section('descripcion_pagina', 'Crear cita per a un pacient')

@section('content')
<main class="crearCitaContainer">
    <section class="tituloCrearCita">
        <h1 class="medionegrita">Crear cita</h1>
    </section>

    <section class="contenidoCrearCita">
       
        <form action="{{route('guardarCita')}}" id="formCrearCita" class="formularioCrearCita" method="POST">
            @csrf

            <p class="medionegrita">Paciente: {{$paciente->user->name}} {{$paciente->user->lastName}}</p>
          
            <seleccionPrueba-component :pruebas='@json($pruebas)' :errorTipo='@json($errors->first("citaPrueba"))'
                                       :errorPrueba='@json($errors->first("prueba_id"))' 
                                       :valorTipo='@json(old("citaPrueba"))' :valorPrueba='@json(old("prueba_id"))'>
            </seleccionPrueba-component>

            <label for="nombrePaciente">Selecciona el nivel de emergencia:</label>
            @error('emergency_level')
            <p class="medionegrita errorCrearCita">{{ $message }}</p>
            @enderror
            <div class="nivelEmergencia">
                @for($i = 1; $i <= 5; $i++) 
                    <input type="radio" name="emergency_level" id="nivel{{ $i }}" value="{{ $i }}" {{ old('emergency_level') == $i ? 'checked' : '' }}>
                    <label for="nivel{{ $i }}">{{ $i }}</label>
                @endfor
            </div>
            <input type="hidden" name="paciente_id" value="{{ $paciente->id}}">
            <button>Crear Cita</button>
        </form>


    </section>

</main>
@endsection
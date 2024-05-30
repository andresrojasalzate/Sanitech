@extends('layouts.master')

@section('title', 'Assignar Cites')
@section('descripcion_pagina', 'Pantalla per assignar cites sol·licitades per metges')

@section('content')

    <main class="allform-container">
        @if ($ruta === 'reprogramarCita')
            <x-boton-atras :url="route('reprogramarCita')" />
        @elseif ($ruta === 'asignarFechaCita')
            <x-boton-atras :url="route('asignarFechaCita')" />
        @endif
        <section class="allform-container-title">
            @if ($ruta === 'reprogramarCita')
                <h2 class="regular">Reprogramar cita</h2>
                <p>Aquí pots reprogramar la cita d’un pacient</p>
            @elseif ($ruta === 'asignarFechaCita')
                <h1 class="regular">Asignar data</h1>
                <p>Assigni una data per a la cita del pacient</p>
            @endif
        </section>

        <div class="allform-container-content">
            <div class="allform-container-content-datos-personales">
                <h4>Dades de la cita</h4>
                <div class="allform-container-content-datos-personales-usuario">
                    <p class="negrita">Nom</p>
                    <p>{{ $name }}</p>
                </div>
                <hr>
                <div class="allform-container-content-datos-personales-usuario">
                    <p class="negrita">Nivell d'emergéncia</p>
                    <p> {{ $emergency_level }} </p>
                </div>
                <hr>
                <div class="allform-container-content-datos-personales-usuario">
                    <p class="negrita">Nom de la prova</p>
                    <p> {{ $nombrePrueba }} </p>
                </div>
                <hr>
            </div>

            <form action="{{ route('cita.actualizar', ['id' => $cita_id, 'ruta' => $ruta]) }}" method="POST"
                class="form-container">
                @csrf
                <div id="agendarCita">
                    <agendar-citas-component :cita_id='{{ $cita_id }}'
                        :medicos='{{ $medicos }}' :datos_cita='{{$datosCita}}'></agendar-citas-component>
                </div>
                @error('error')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="confirmar-btn">Enviar</button>
            </form>
        </div>
    </main>
@endsection

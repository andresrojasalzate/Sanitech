@extends('layouts.master')

@section('title', 'Cercador pacient')
@section('descripcion_pagina', 'Cerca el pacient que desitges')

@section('content')
    <main class="filtrarPacientesContainer">

        <x-boton-atras :url="route('home')" />
        
        <section class="buscadorPaciente-title">
            <h2 class="regular">Cercador pacients</h2>
            <p>Selecciona el pacient
                @if ($accion === 'crearCita')
                    al qual li assignarà la cita
                @elseif ($accion === 'resultadosPaciente')
                    que li vols consultar els resultats
                @else
                    que li vols consultar l'agenda
                @endif
            </p>
        </section>

        <section class="filtradorPaciente">
            <div id="buscadorPacientes">
                <buscadorPaciente-component :pacientes='@json($pacientes)'
                    :idMedico='@json($idMedico)' :accion='@json($accion)'
                    :apiKey='@json($apiKey)'></buscadorPaciente-component>
            </div>
        </section>
    </main>
@endsection

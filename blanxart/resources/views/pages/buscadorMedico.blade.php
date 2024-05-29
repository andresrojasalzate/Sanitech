@extends('layouts.master')

@section('title', 'Cercador metges')
@section('descripcion_pagina', 'Cerca el metge que desitges')

@section('content')
    <main class="filtrarPacientesContainer">

        <x-boton-atras :url="route('home')" />

        <section class="buscadorPaciente-title">
            <h2 class="regular">Cercador metges</h2>
            <p>Selecciona el metge per veure les seves cites assignades</p>
        </section>

        <section class="filtradorPaciente">
            <div id="buscadorMedicos">
                <buscadorMedico :medicos='@json($medicos)' :accion='@json($accion)'
                    :apiKey='@json($apiKey)'></buscadorMedico>
            </div>
        </section>
    </main>
@endsection

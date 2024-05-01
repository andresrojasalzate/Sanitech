@extends('layouts.master')

@section('title', 'Cercador pacient')
@section('descripcion_pagina', 'Busca el pacient que desitges')

@section('content')
<main class="filtrarPacientesContainer">

<section class="tituloBuscadorPaiente">
        <h1 class="medionegrita">Cercador pacients</h1>
    </section>

    <section class="filtradorPaciente">
        <div id="buscadorPacientes">
            <buscadorPaciente-component :pacientes='@json($pacientes)' :idMedico='@json($idMedico)' :accion='@json($accion)' :apiKey='@json($apiKey)'></buscadorPaciente-component>
        </div>
    </section>
</main>
@endsection
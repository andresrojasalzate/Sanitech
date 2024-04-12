@extends('layouts.master')

@section('title', 'Informes Clínicos')
@section('descripcion_pagina', 'Lista de tus Informes Clínicos')

@section('content')
<main class="filtrarPacientesContainer">
    <section class="filtradorPaciente">
        <div id="buscadorPacientes">
            <buscadorPaciente-component></buscadorPaciente-component>
        </div>
        <!-- <div class="contenedorFiltro">
            <input type="text" name="" id="" placeholder="Buscar paciente...">
            <p>Pacientes encontrados: 6</p>
        </div> -->
    </section>
</main>
@endsection
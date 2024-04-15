@extends('layouts.master')

@section('title', 'Informes Clínicos')
@section('descripcion_pagina', 'Lista de tus Informes Clínicos')

@section('content')
<main class="filtrarPacientesContainer">
    <section class="filtradorPaciente">
        <div id="buscadorPacientes">
            <buscadorPaciente-component></buscadorPaciente-component>
        </div>
    </section>
</main>
@endsection
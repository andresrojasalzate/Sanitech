@extends('layouts.master')

@section('title', 'Cercador metges')
@section('descripcion_pagina', 'Busca el metge que desitges')

@section('content')
<main class="filtrarPacientesContainer">

<section class="tituloBuscadorPaiente">
        <h1 class="medionegrita">Cercador metges</h1>
    </section>

    <section class="filtradorPaciente">
        <div id="buscadorMedicos">
            <buscadorMedico :medicos='@json($medicos)' :accion='@json($accion)'></buscadorMedico>
        </div>
    </section>
</main>
@endsection
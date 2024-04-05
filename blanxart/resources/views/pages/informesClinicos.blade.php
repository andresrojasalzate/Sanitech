@extends('layouts.master')

@section('title', 'Informes Clínicos')
@section('descripcion_pagina', 'Lista de tus Informes Clínicos')

@section('content')
<main class="informesContainer">
    <section class="tituloInformes">
        <h1 class="medionegrita">Informes clínicos</h1>
    </section>

    <section class="listaInformes"> 
        <div id="informesClinicos">
            @foreach($citas as $cita)
            <informes-component :cita='@json($cita)'></informes-component>
            @endforeach
        </div>
    </section>
    
</main>
@endsection
@extends('layouts.master')

@section('title', 'Home')
@section('descripcion_pagina', 'Bienvenido a Blanxart, tu espacio de salut digital.')

@section('content')

    <main class="homeContainer">
        <section class="info">
            <h1 class="regular">Hola {{auth()->user()->name}}</h1>
            <h2 class="regular">Benvingut al teu espai de salut digital.</h2>
        </section>

        @if(auth()->user()->rol === 'paciente')
        <section class="opciones">
            <a href="{{ route('agenda' , ['id' => auth()->user()->id])  }}">
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <h4 class="medionegrita">Agenda</h4>
                </div>
            </a>

            <a href="{{ route('informesClinicos', ['id' => auth()->user()->id]) }}">

                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-microscope"></i>
                    </div>
                    <h4 class="medionegrita">Informes i resultats</h4>
                </div>
            </a>

            <a href="{{ route('solicitudes', ['id' => auth()->user()->id]) }}">
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-question"></i>
                    </div>
                    <h4 class="medionegrita">Solicituts</h4>
                </div>
            </a>

            <a href="#">
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-bell"></i>
                    </div>
                    <h4 class="medionegrita">Notificacions</h4>
                </div>
            </a>
        </section>

        @elseif(auth()->user()->rol === 'medico')
        <section>
            <a href="{{route('buscadorPacientes')}}">
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h4 class="medionegrita">Pacientes</h4>
                </div>
            </a>
        </section>
        @elseif(auth()->user()->rol === 'admin')
        <a href="#">
            <div class="opciones-opcion">
                <div class="opciones-opcion-card">
                    <i class="fa-solid fa-tarp"></i>
                </div>
                <h4 class="medionegrita">Tareas</h4>
            </div>
        </a>
        @endif
    </main>

@endsection
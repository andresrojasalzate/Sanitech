@extends('layouts.master')

@section('title', 'Sol·licituds')
@section('descripcion_pagina', 'Sol·licituds dels pacients')

@section('content')

    <main class="solicitudesContainer">

        <x-boton-atras :url="route('home')" />

        <section class="info">
            <h1 class="regular">Solicituts</h1>
            <p>Fes consultes, gestions o demana una cita.</p>
        </section>

        <section class="solicitudes">


            <a>
                <div class="solicitudes-card_type_2">
                    <div class="solicitudes-card_type_2-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <div class="solicitudes-card_type_2-info">
                        <h4 class="medionegrita">Canviar metge</h4>
                    </div>
                </div>
            </a>

            <a href="{{ route('justificante', ['id' => auth()->user()->id]) }}">
                <div class="solicitudes-card_type_2">
                    <div class="solicitudes-card_type_2-icon">
                        <i class="fa-solid fa-file"></i>
                    </div>
                    <div class="solicitudes-card_type_2-info">
                        <h4 class="medionegrita">Justificant</h4>
                    </div>
                </div>
            </a>

            <a href="{{ route('pedirCita', ['id' => auth()->user()->paciente->id]) }}">
                <div class="solicitudes-card_type_2">
                    <div class="solicitudes-card_type_2-icon">
                        <i class="fa-regular fa-calendar-check"></i>
                    </div>
                    <div class="solicitudes-card_type_2-info">
                        <h4 class="medionegrita">Demanar cita</h4>
                    </div>
                </div>
            </a>
        </section>
    </main>

@endsection

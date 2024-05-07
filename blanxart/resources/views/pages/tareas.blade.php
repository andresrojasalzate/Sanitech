@extends('layouts.master')

@section('title', 'Solicitudes')
@section('descripcion_pagina', 'Solicitudes de los pacientes')

@section('content')

    <main class="solicitudesContainer">

        <x-boton-atras :url="route('home')" />

        <section>
            <section class="info">
                <h1 class="regular">Tasques</h1>
                <p>Aquí pots gestionar les cites programades pels metges.</p>
            </section>
        </section>

        <section class="solicitudes">
            <a href="{{ route('reprogramarCita') }}">
                <div class="solicitudes-card_type_2">
                    <div class="solicitudes-card_type_2-icon">
                        <i class="fa-solid fa-file"></i>
                    </div>
                    <div class="solicitudes-card_type_2-info">
                        <h4 class="medionegrita">Reprogramar cita</h4>
                    </div>
                </div>
            </a>

            <a href="{{ route('asignarFechaCita') }}">
                <div class="solicitudes-card_type_2">
                    <div class="solicitudes-card_type_2-icon">
                        <i class="fa-regular fa-calendar-check"></i>
                    </div>
                    <div class="solicitudes-card_type_2-info">
                        <h4 class="medionegrita">Asignar cita</h4>
                    </div>
                </div>
            </a>

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
        </section>
    </main>

@endsection

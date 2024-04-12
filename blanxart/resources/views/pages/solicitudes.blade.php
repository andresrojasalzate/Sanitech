@extends('layouts.master')

@section('title', 'Solicitudes')
@section('descripcion_pagina', 'Solicitudes de los pacientes')

@section('content')

    <main class="solicitudesContainer">

        <x-boton-atras :url="route('home')" />

        <section>
            <section class="info">
                <h1 class="regular">Solicituts</h1>
            </section>
        </section>

        <section class="solicitudes">
            <a>
                <div class="solicitudes-solicitud">
                    <div class="solicitudes-solicitud-icon">
                        <i class="fa-solid fa-arrows-to-eye"></i>
                    </div>
                    <div class="solicitudes-solicitud-info">
                        <h4 class="medionegrita">Valoracions</h4>
                    </div>
                </div>
            </a>

            <a>
                <div class="solicitudes-solicitud">
                    <div class="solicitudes-solicitud-icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <div class="solicitudes-solicitud-info">
                        <h4 class="medionegrita">Canviar metge</h4>
                    </div>
                </div>
            </a>

            <a href="{{ route('justificante') }}">
                <div class="solicitudes-solicitud">
                    <div class="solicitudes-solicitud-icon">
                        <i class="fa-solid fa-file"></i>
                    </div>
                    <div class="solicitudes-solicitud-info">
                        <h4 class="medionegrita">Justificant</h4>
                    </div>
                </div>
            </a>

            <a>
                <div class="solicitudes-solicitud">
                    <div class="solicitudes-solicitud-icon">
                        <i class="fa-regular fa-calendar-check"></i>
                    </div>
                    <div class="solicitudes-solicitud-info">
                        <h4 class="medionegrita">Demanar cita</h4>
                    </div>
                </div>
            </a>

            <a>
                <div class="solicitudes-solicitud">
                    <div class="solicitudes-solicitud-icon">
                        <i class="fa-solid fa-heart-circle-exclamation"></i>
                    </div>
                    <div class="solicitudes-solicitud-info">
                        <h4 class="medionegrita">Reclamacions</h4>
                    </div>
                </div>
            </a>
        </section>
    </main>

@endsection

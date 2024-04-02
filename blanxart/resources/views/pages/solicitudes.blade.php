@extends('layouts.master')

@section('title', 'Solicitudes')
@section('descripcion_pagina', 'Solicitudes de los pacientes')

@section('content')

    <main class="solicitudesContainer">
        <section>
            <section class="info">
                <h1 class="regular">Solicitudes</h1>
            </section>
        </section>

        <section class="solicitudes">
            <a>
                <div class="solicitudes-solicitud">
                    <div class="solicitudes-solicitud-card">
                        <i class="fa-solid fa-arrows-to-eye"></i>
                    </div>
                    <h4 class="medionegrita">Valoraciones</h4>
                </div>
            </a>

            <a>
                <div class="solicitudes-solicitud">
                    <div class="solicitudes-solicitud-card">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <h4 class="medionegrita">Cambio de médico</h4>
                </div>
            </a>

            <a>
                <div class="solicitudes-solicitud">
                    <div class="solicitudes-solicitud-card">
                        <i class="fa-solid fa-file"></i>
                    </div>
                    <h4 class="medionegrita">Justificantes</h4>
                </div>
            </a>

            <a>
                <div class="solicitudes-solicitud">
                    <div class="solicitudes-solicitud-card">
                        <i class="fa-regular fa-calendar-check"></i>
                    </div>
                    <h4 class="medionegrita">Pedir cita</h4>
                </div>
            </a>

            <a>
                <div class="solicitudes-solicitud">
                    <div class="solicitudes-solicitud-card">
                        <i class="fa-solid fa-heart-circle-exclamation"></i>
                    </div>
                    <h4 class="medionegrita">Reclamaciones</h4>
                </div>
            </a>
        </section>
    </main>

@endsection
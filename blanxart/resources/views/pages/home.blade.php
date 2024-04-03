@extends('layouts.master')

@section('title', 'Home')
@section('descripcion_pagina', 'Bienvenido a Blanxart, tu espacio de salut digital.')

@section('content')

    <main class="homeContainer">
        <section class="info">
            <h1 class="regular">Hola, Lordan Burgos</h1>
            <h2 class="regular">Bienvenido a tu espacio de salud digitat.</h2>
        </section>

        <section class="opciones">
            <a>
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <h4 class="medionegrita">Agenda</h4>
                </div>
            </a>

            <a href="#">
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-microscope"></i>
                    </div>
                    <h4 class="medionegrita">Informes y resultados</h4>
                </div>
            </a>

            <a href="{{ route('solicitudes') }}">
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-question"></i>
                    </div>
                    <h4 class="medionegrita">Solicitudes</h4>
                </div>
            </a>

            <a href="#">
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-question"></i>
                    </div>
                    <h4 class="medionegrita">Solicitudes</h4>
                </div>
            </a>
        </section>
    </main>

@endsection
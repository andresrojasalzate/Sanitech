@extends('layouts.master')

@section('title', 'Home')
@section('descripcion_pagina', 'Bienvenido a Blanxart, tu espacio de salut digital.')

@section('content')

    <main class="homeContainer">
        <section class="info">
            <h1 class="">Hola, </h1>
            <h2 class="regular">Bienvenido a tu espacio de salud digitat.</h2>
        </section>

        <section class="opciones">
            <a href="#">
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <p>Agenda</p>
                </div>
            </a>

            <a href="#">
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-microscope"></i>
                    </div>
                    <p>Informes y resultados</p>
                </div>
            </a>

            <a href="#">
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-question"></i>
                    </div>
                    <p>Solicitudes</p>
                </div>
            </a>

            <a href="#">
                <div class="opciones-opcion">
                    <div class="opciones-opcion-card">
                        <i class="fa-solid fa-question"></i>
                    </div>
                    <p>Solicitudes</p>
                </div>
            </a>
        </section>
    </main>

@endsection
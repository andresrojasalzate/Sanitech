@extends('layouts.master')

@section('title', 'Home')
@section('descripcion_pagina', 'Bienvenido a Blanxart, tu espacio de salut digital.')

@section('content')

    <main class="homeContainer">
        <section class="info">
            <h1>Hola, </h1>
            <p>Bienvenido a tu espacio de salud digitat.</p>
        </section>

        <section class="items">
            <div class="item">
                <p>Agenda</p>
            </div>

            <div class="item">
                <p>Informes y resultados</p>
            </div>

            <div class="item">
                <p>Solicitudes</p>
            </div>
        </section>
    </main>

@endsection
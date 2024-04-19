@extends('layouts.master')

@section('title', 'Pedir cita')
@section('descripcion_pagina', 'Demanar una cita al CAP')

@section('content')
<main class="pedirCita-container">
    <section class="pedirCita-container-title">
        <h1>Cita amb el metge</h1>
        <h2>Soliciti una cita amb el metge</h2>
    </section>

    <section class="pedirCita-container-content">
        <div class="pedirCita-container-content-datos-personales">
            <p>Les meves dades</p>
            <p>Nom</p>
            <p>CIP</p>
            <p>Codi postal</p>
        </div>

        <form action="{{ route('guardarPedirCita') }}" id="formPedirCita" class="formularioPedirCita" method="POST">
            @csrf
            <h3>1. Seleccioni el dia de la cita</h3>
            <selecciondia-component></selecciondia-component>
        </form>
    </section>
</main>




<div id="pedircita">
    <pedircita-component :dias-no-disponibles='{{$diasNoDisponibles}}'></pedircita-component>
</div>

@endsection
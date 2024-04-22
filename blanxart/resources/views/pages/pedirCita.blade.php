@extends('layouts.master')

@section('title', 'Pedir cita')
@section('descripcion_pagina', 'Demanar una cita al CAP')

@section('content')
<main class="pedirCita-container">

    <x-boton-atras :url="route('home')" />

    <section>
        <h1>Cita amb el metge</h1>
        <h2>Soliciti una cita amb el metge</h2>
    </section>

    <section class="pedirCita-container-content">
        <div class="pedirCita-container-content-datos-personales">
            <h4>Les meves dades</h4>
            <div>
                <div class="pedirCita-container-content-datos-personales-usuario">
                    <p>Nom</p>
                    <p>{{auth()->user()->name}}</p>
                </div>
                <div class="pedirCita-container-content-datos-personales-usuario">
                    <p>CIP</p>
                    <p>{{ $paciente->CIP }}</p>
                </div>
                <div class="pedirCita-container-content-datos-personales-usuario">
                    <p>Nom</p>
                    <p>{{ $paciente->post_code }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('guardarPedirCita') }}" id="formPedirCita" class="pedirCita-container-content-formulario" method="POST">
            @csrf
            <div class="formulario-2-columns">
                <div class="pedirCita-container-content-formulario-apartado">
                    <h3>1. Seleccioni el dia de la cita</h3>
                    <selecciondia-component :dias-no-disponibles='{{$diasNoDisponibles}}'></selecciondia-component>
                </div>
    
                <div class="pedirCita-container-content-formulario-apartado">
                    <h3>2. Seleccioni la hora</h3>
                    <select>
                        <option>09:30h</option>
                        <option>10:30h</option>
                    </select>
                </div>
            </div>

            <div class="pedirCita-container-content-formulario-apartado">
                <h3>3. Motiu de la vistia</h3>
                <textarea></textarea>
            </div>

            <button class="confirmar-btn">Demanar Cita</button>
        </form>
    </section>
</main>

@endsection
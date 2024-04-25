@extends('layouts.master')

@section('title', 'Pedir cita')
@section('descripcion_pagina', 'Demanar una cita al CAP')

@section('content')
    <main class="allform-container">

        <x-boton-atras :url="route('solicitudes', ['id' => auth()->user()->id])" />

        <section>
            <h1>Cita amb el metge</h1>
            <h2>Soliciti una cita amb el metge</h2>
        </section>

        <section class="pedirCita-container-content">
            <div class="pedirCita-container-content-datos-personales">
                <h4>Les meves dades</h4>
                <div class="pedirCita-container-content-datos-personales-usuario">
                    <p class="negrita">Nom</p>
                    <p>{{ auth()->user()->name }} {{ auth()->user()->lastName }}</p>
                </div>
                <hr>
                <div class="pedirCita-container-content-datos-personales-usuario">
                    <p class="negrita">CIP</p>
                    <p>{{ $paciente->CIP }}</p>
                </div>
                <hr>
                <div class="pedirCita-container-content-datos-personales-usuario">
                    <p class="negrita">Codi</p>
                    <p>{{ $paciente->post_code }}</p>
                </div>
            </div>

            <form action="{{ route('guardarPedirCita') }}" method="POST" class="form-container">
                @csrf
                <div id="formPedirCita">
                    <selecciondia-component :dias-no-disponibles='{{ $diasNoDisponibles }}'></selecciondia-component>
                </div>
                <button class="confirmar-btn">Demanar Cita</button>
            </form>
        </section>
    </main>

@endsection

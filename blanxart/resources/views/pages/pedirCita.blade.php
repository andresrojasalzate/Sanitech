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
            <div>
                <p>Nom</p>
                <p>CIP</p>
                <p>Codi postal</p>
            </div>
        </div>

        <form action="{{ route('guardarPedirCita') }}" id="formPedirCita" class="formularioPedirCita" method="POST">
            @csrf
            <div>
                <h3>1. Seleccioni el dia de la cita</h3>
                <selecciondia-component :dias-no-disponibles='{{$diasNoDisponibles}}'></selecciondia-component>
            </div>

            <div>
                <h3>2. Seleccioni la hora</h3>
                <select>
                    <option>09:30h</option>
                    <option>10:30h</option>
                </select>
            </div>

            <div>
                <h3>3. Motiu de la vistia</h3>
                <textarea></textarea>
            </div>

            <button class="confirmar-btn">Demanar Cita</button>
        </form>
    </section>
</main>

@endsection
@extends('layouts.master')

@section('title', 'Asignar Citas')
@section('descripcion_pagina', 'Pantalla para asignar citas solicitadas por medicos')

@section('content')

    <main class="allform-container">
        {{-- @dd($ruta) --}}
        <x-boton-atras :url="route('solicitudes', ['id' => auth()->user()->id])" />

        <section>
            <h1>Cita amb el metge</h1>
            <h2>Soliciti una cita amb el metge</h2>
        </section>

        <div class="allform-container-content-datos-personales">
            <h4>Dades de la cita</h4>
            <div class="allform-container-content-datos-personales-usuario">
                <p class="negrita">Nom</p>
            </div>
            <hr>
            <div class="allform-container-content-datos-personales-usuario">
                <p class="negrita">Nivell d'emergéncia</p>
                <p></p>
            </div>
            <hr>
            <div class="allform-container-content-datos-personales-usuario">
                <p class="negrita">Nom de la prova</p>
                <p></p>
            </div>
            <hr>
        </div>

        <form action="{{ route('cita.actualizar', ['id' => $cita_id, 'ruta' => $ruta]) }}" method="POST" class="form-container">
            @csrf
            <div id="agendarCita">
                <agendar-citas-component :cita_id='{{ $cita_id }}'
                    :medicos='{{ $medicos }}'></agendar-citas-component>
            </div>
            @error('error')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="confirmar-btn">Enviar</button>
        </form>
    </main>
@endsection

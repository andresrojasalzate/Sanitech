@extends('layouts.master')

@section('title', 'Sol·licitud de canvi de metge')
@section('descripcion_pagina', 'Demana un canvi de metge')

@section('content')
    <main class="allform-container">

        <x-boton-atras :url="route('solicitudes', ['id' => auth()->user()->id])" />

        @if (session('status'))
            <div id="alertaExito">
                <aletraExito :mensaje='@json(session('status'))'>
                    </alertaExito>
            </div>
        @endif

        <section class="allform-container-title">
            <h2 class="regular">Canvi de metge</h2>
            <p>Redacti el motiu pel qual vol canviar de metge</p>
        </section>

        <section class="allform-container-content">
            <div class="allform-container-content-datos-personales">
                <h4>Les meves dades</h4>
                <div class="allform-container-content-datos-personales-usuario">
                    <p class="negrita">Nom</p>
                    <p>{{ auth()->user()->name }} {{ auth()->user()->lastName }}</p>
                </div>
                <hr>
                <div class="allform-container-content-datos-personales-usuario">
                    <p class="negrita">CIP</p>
                    <p>{{ $paciente->CIP }}</p>
                </div>
                <hr>
                <div class="allform-container-content-datos-personales-usuario">
                    <p class="negrita">Codi</p>
                    <p>{{ $paciente->post_code }}</p>
                </div>
            </div>

            <form class="form-container" action="{{ route('cambiarMedico.store') }}" method="post">
                @csrf
                @error('reason')
                    <p class="medionegrita errorCrearCita">{{ $message }}</p>
                @enderror
                <div class="form-group" id="form-group-3">
                    <label for="descripcion">Motiu del canvi de metge</label>
                    <textarea name="reason" placeholder="Motiu del canvi de metge..."></textarea>
                </div>
                <input type="hidden" name="paciente_id" value="{{ $idPaciente }}">
                <button class="confirmar-btn" type="submit">Enviar sol·licitud</button>
            </form>
        </section>
    </main>
@endsection

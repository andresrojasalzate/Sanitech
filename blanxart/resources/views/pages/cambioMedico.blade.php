@extends('layouts.master')

@section('title', 'Cercador pacient')
@section('descripcion_pagina', 'Cerca el pacient que desitges')

@section('content')
    <main class="cambiarMedicoContainer">
        <section class="tituloCambiarMedico">
                <h1 class="medionegrita">Cambi de metge</h1>
        </section>

        @if (session('status'))
            <div id="alertaExito">
                <aletraExito :mensaje='@json(session("status"))'></alertaExito>
            </div>
        @endif

        <section class="contenedorSolicitudCambioMedico">
            <form class="formularioCambioMedico" action="{{ route('cambiarMedico.store') }}" method="post">
                @csrf
                <label for="reason">Especifiqui el motiu pel qual es vol canviar de metge </label>
                @error('reason')
                    <p class="medionegrita errorCrearCita">{{ $message }}</p>
                @enderror
                <textarea name="reason" placeholder="Motiu del canvi de metge..."></textarea>
                <input type="hidden" name="paciente_id" value="{{ $idPaciente }}">
                <button type="submit">Enviar sol·licitud</button>
            </form>
        </section>
    </main>
@endsection
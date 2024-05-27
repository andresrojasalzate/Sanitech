@extends('layouts.master')

@section('title', 'Sol·licitud de canvi de metge')
@section('descripcion_pagina', 'Demana un canvi de metge')

@section('content')
<main>
    <section class="tituloCrearCita">
        <h1 class="medionegrita">Sol·licitud de canvi de metge</h1>
    </section>

    <section>
        <div class="contenedorCambioMedicoAdmin">
            <div class="allform-container-content-datos-personales">
                <h4>Dades del pacient</h4>
                <div class="allform-container-content-datos-personales-usuario">
                    <p class="negrita">Nom</p>
                    <p>{{ $paciente->user->name }} {{ $paciente->user->lastName }}</p>
                </div>
                <hr>
                <div class="allform-container-content-datos-personales-usuario">
                    <p class="negrita">DNI</p>
                    <p>{{ $paciente->user->dni }}</p>
                </div>
                <hr>
                <div class="allform-container-content-datos-personales-usuario">
                    <p class="negrita">Telèfon</p>
                    <p>{{ $paciente->user->phone_number }}</p>
                </div>
                <hr>
                <div class="allform-container-content-datos-personales-usuario">
                    <p class="negrita">Metge actual</p>
                    <p>{{ $medicoActual }}</p>
                </div>
            </div>
            <div class="allform-container-content-datos-personales">
                <h4 class="medionegrita">Motiu del pacient</h4>
                <p>{{$motivoPaciente}}</p>
            </div>
            <div id="formularioCambioMedico">
                <cambioMedico  id="cambio-medico-form" :csrf-token="'{{ csrf_token() }}'" :medicos='@json($medicos)' :id-paciente='@json($idPaciente)'  :errors='@json($errors->toArray())'></cambioMedico>
            </div>
        </div>
    </section>
</main>

@if ($errors->any())
    <script src="{{ asset('js/formularioCambioAdmin.js') }}"></script>
@endif
@endsection
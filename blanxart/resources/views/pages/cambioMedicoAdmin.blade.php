@extends('layouts.master')

@section('title', 'Sol·licitud de canvi de metge')
@section('descripcion_pagina', 'Demana un canvi de metge')

@section('content')
<main class="">
    <section class="tituloCrearCita">
        <h1 class="medionegrita">Sol·licitud de canvi de metge</h1>
    </section>

    <section class="allform-container-content">
        <div class="contenedorInfoPaciente">
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
        </div>
       
    </section>
</main>
@endsection
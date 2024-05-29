@extends('layouts.master')

@section('title', 'Demanar cita')
@section('descripcion_pagina', 'Demanar una cita al CAP')

@section('content')
    <main class="allform-container">

        <x-boton-atras :url="route('solicitudes', ['id' => auth()->user()->id])" />

        <section class="allform-container-title">
            <h2 class="regular">Cita amb el metge</h2>
            <p>Sol·liciti una cita amb el metge</p>
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

            <form action="{{ route('publicarPeticionCita') }}" method="POST" class="form-container">
                @csrf
                <div id="formPedirCita">
                    <selecciondia-component></selecciondia-component>
                </div>
                @error('error')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <input type="hidden" name="paciente_id" value="{{ $paciente->id}}">
                <button type="submit" class="confirmar-btn">Enviar</button>
            </form>
        </section>
    </main>

@endsection

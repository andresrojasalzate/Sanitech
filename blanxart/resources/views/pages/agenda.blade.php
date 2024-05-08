@extends('layouts.master')

@section('title', 'Cites')
@section('descripcion_pagina', 'Benvingut a les cites')

@section('content')

    {{-- @dd(auth()->user()->rol); --}}
    @if (auth()->user()->rol === 'medico')
        <x-boton-atras :url="route('buscadorPacientes', ['accion' => 'agendaPaciente'])" />
    @elseif (auth()->user()->rol === 'paciente')
        <x-boton-atras :url="route('home')" />
    @endif
    <div id="agenda">
        <citas-component :citas='@json($citas)'></citas-component>
    </div>

@endsection

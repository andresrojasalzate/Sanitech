@extends('layouts.master')

@section('title', 'Cites')
@section('descripcion_pagina', 'Benvingut a les cites')

@section('content')

    <x-boton-atras :url="route('buscadorPacientes', ['accion' => 'agendaPaciente'])" />

    <div id="agenda">
        <citas-component :citas='@json($citas)'></citas-component>
    </div>

@endsection

@extends('layouts.master')

@section('title', 'Assignar Cites')
@section('descripcion_pagina', 'Pantalla per assignar cites sol·licitades per metges')

@section('content')
<x-boton-atras :url="route('tareas')" />

@if (session('status'))
<div id="alertaExito">
    <aletraExito :mensaje='@json(session("status"))'>
        </alertaExito>
</div>
@endif

<div id="asignarCita">
    <asignar-citas-component :citas="{{ json_encode($citas) }}"></asignar-citas-component>
</div>

@endsection
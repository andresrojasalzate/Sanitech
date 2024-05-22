
@extends('layouts.master')

@section('title', 'Assignar Cites')
@section('descripcion_pagina', 'Pantalla per assignar cites sol·licitades per metges')

@section('content')
<x-boton-atras :url="route('tareas')" />
<div id="listadoCambioMedico">
    <listado-component :lista="{{ json_encode($lista) }}"></listado-component>
</div>

@endsection
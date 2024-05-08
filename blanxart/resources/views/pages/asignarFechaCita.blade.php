@extends('layouts.master')

@section('title', 'Assignar Cites')
@section('descripcion_pagina', 'Pantalla per assignar cites sol·licitades per metges')

@section('content')

<div id="asignarCita">
    <asignar-citas-component :citas="{{ json_encode($citas) }}"></asignar-citas-component>
</div>

@endsection
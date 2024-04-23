@extends('layouts.master')

@section('title', 'Asignar Citas')
@section('descripcion_pagina', 'Pantalla para asignar citas solicitadas por medicos')

@section('content')

<div id="asignarCita">
    <asignar-citas-component :citas="{{ json_encode($citas) }}"></asignar-citas-component>
</div>

@endsection
@extends('layouts.master')

@section('title', 'Asignar Citas')
@section('descripcion_pagina', 'Pantalla para asignar citas solicitadas por medicos')

@section('content')



<div id="reprogramarCita">
    <reprogramar-citas-component :citas="{{ json_encode($citas) }}"></reprogramar-citas-component>
</div>
@endsection
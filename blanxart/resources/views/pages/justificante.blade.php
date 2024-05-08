@extends('layouts.master')

@section('title', 'Justificant')
@section('descripcion_pagina', 'Pàgina per generar justificants de cites realitzades')

@section('content')
    <x-boton-atras :url="route('solicitudes')" />
    <div id="justificante">
        <justificante-component :citas='@json($citas)'></justificante-component>
    </div>
@endsection

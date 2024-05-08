@extends('layouts.master')

@section('title', 'Justificant')
@section('descripcion_pagina', 'Pàgina per generar justificants de cites realitzades')

@section('content')
    <x-boton-atras :url="route('home')" />
    <div id="justificante">
        <justificante-component :citas='@json($citas)'></justificante-component>
    </div>
@endsection

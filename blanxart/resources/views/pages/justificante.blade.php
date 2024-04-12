@extends('layouts.master')

@section('title', 'Justificante')
@section('descripcion_pagina', 'Página para generar justificantes de citas realizadas')

@section('content')
    <x-boton-atras :url="route('home')" />
    <div id="justificante">
        <justificante-component :citas='@json($citas)'></justificante-component>
    </div>
@endsection

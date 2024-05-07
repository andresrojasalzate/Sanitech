@extends('layouts.master')

@section('title', 'Citas')
@section('descripcion_pagina', 'Bienvenido a las citas')

@section('content')

    <x-boton-atras :url="route('home')" />

    <div id="agenda">
        <citas-component :citas='@json($citas)'></citas-component>
    </div>

@endsection

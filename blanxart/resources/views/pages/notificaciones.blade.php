@extends('layouts.master')

@section('title', 'Notificaciones')
@section('descripcion_pagina', 'Bienvenido a las notificaciones')

@section('content')
<x-boton-atras :url="route('home')" />

<div id="notificaciones">
    <notificaciones-component :notificaciones='{{$notificaciones}}'></notificaciones-component>
</div>

@endsection
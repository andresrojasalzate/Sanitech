@extends('layouts.master')

@section('title', 'Notificacions')
@section('descripcion_pagina', 'Benvingut a les notificacions')

@section('content')
<x-boton-atras :url="route('home')" />

<div id="notificaciones">
    <notificaciones-component :notificaciones='{{$notificaciones}}'></notificaciones-component>
</div>

@endsection
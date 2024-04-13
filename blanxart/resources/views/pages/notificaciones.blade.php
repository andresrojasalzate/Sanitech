@extends('layouts.master')

@section('title', 'Notificaciones')
@section('descripcion_pagina', 'Bienvenido a las notificaciones')

@section('content')

<div id="notificaciones">
    <notificaciones-component :notificaciones='{{$notificaciones}}'></notificaciones-component>
</div>

@endsection
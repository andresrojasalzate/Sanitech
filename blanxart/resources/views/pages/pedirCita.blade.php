@extends('layouts.master')

@section('title', 'Pedir cita')
@section('descripcion_pagina', 'Aquí puedes pedir una cita a tu médico.')

@section('content')

<div id="pedircita">
    <pedircita-component :dias-no-disponibles='{{$diasNoDisponibles}}'></pedircita-component>
</div>

@endsection
@extends('layouts.master')

@section('title', 'Citas')
@section('descripcion_pagina', 'Bienvenido a las citas')

@section('content')

<div id="agenda">
    {{-- @dd(json_encode($citas)); --}}
    <citas-component :citas='@json($citas)'></citas-component>
</div>

@endsection
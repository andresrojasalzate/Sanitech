@extends('layouts.master')

@section('title', 'Justificante')
@section('descripcion_pagina', 'Página para generar justificantes de citas realizadas')

@section('content')
    {{-- <a href="{{ route('generarJustificante') }}">Generar pdf</a> --}}
    <div id="justificante">
        <justificante-component :citas='@json($citas)'></justificante-component>
    </div>
@endsection

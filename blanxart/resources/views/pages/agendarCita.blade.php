@extends('layouts.master')

@section('title', 'Asignar Citas')
@section('descripcion_pagina', 'Pantalla para asignar citas solicitadas por medicos')

@section('content')

{{-- @dd($medicos) --}}
<form action="{{ route('cita.actualizar', $cita_id) }}" method="POST" class="form-container">
    @csrf
    <div id="agendarCita">
        <agendar-citas-component :cita_id='{{$cita_id}}' :medicos='{{$medicos}}'></agendar-citas-component>
    </div>
    @error('error')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <button type="submit" class="btn-submit">Enviar</button>
</form>



@endsection
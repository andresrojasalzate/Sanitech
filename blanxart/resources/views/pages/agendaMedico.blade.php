@extends('layouts.master')

@section('title', 'Agenda')
@section('descripcion_pagina', 'Agenda dels metges')

@section('content')

    {{-- {{dd($citasXMedico)}} --}}
    <main class="informesContainer">

        <x-boton-atras :url="route('buscadorMedicos', ['accion' => 'agendaMedico'])" />

        <section class="tituloInformes">
            <h1 class="medionegrita">Agenda</h1>
            <h1 class="medionegrita"></h1>
        </section>

        <section class="listaInformes">
            <div id="agendaMedico">
                @foreach ($citasXMedico as $cita)
                    {{-- {{dd($cita)}} --}}
                    <agendaMedico :cita='@json($cita)'></agendaMedico>
                @endforeach

                @if ($citasXMedico->count())
                    <nav class="menu-paginacion">
                        {{ $citasXMedico->links() }}
                    </nav>
                @endif
            </div>
        </section>

    </main>
@endsection

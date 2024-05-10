@extends('layouts.master')

@section('title', 'Informes clínics')
@section('descripcion_pagina', 'Llista dels teus informes clínics')
@section('descripcion_pagina', 'Llista dels teus informes clínics')

@section('content')

    <main class="informesContainer">
    <main class="informesContainer">

        @if (auth()->user()->rol === 'medico')
            <x-boton-atras :url="route('buscadorPacientes', ['accion' => 'resultadosPaciente'])" />
        @elseif (auth()->user()->rol === 'paciente')
            <x-boton-atras :url="route('home')" />
        @endif

        <section class="tituloInformes">
            <h1 class="medionegrita">Informes clínics</h1>
            <p>Aquí pots visualitzar tots els resultats</p>
        </section>

        <section class="listaInformes">
            @if ($resultados->count())
                <div id="informesClinicos">

                    @foreach ($resultados as $resultado)
        <section class="listaInformes">
            @if ($resultados->count())
                <div id="informesClinicos">

                    @foreach ($resultados as $resultado)
                        <informes-component :resultado='@json($resultado)'></informes-component>
                    @endforeach
                    <nav class="menu-paginacion">
                        {{ $resultados->links() }}
                    </nav>
                </div>
            @else
                <div class="noResultados">
                    <p class="medionegrita">No hi ha informes disponibles en aquest moment.</p>
                </div>
            @endif
        </section>
                </div>
            @else
                <div class="noResultados">
                    <p class="medionegrita">No hi ha informes disponibles en aquest moment.</p>
                </div>
            @endif
        </section>

    </main>
    </main>
@endsection


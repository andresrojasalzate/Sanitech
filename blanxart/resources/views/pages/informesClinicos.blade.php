@extends('layouts.master')

@section('title', 'Informes clínics')
@section('descripcion_pagina', 'Lista de tus Informes Clínicos')

@section('content')

<main class="informesContainer">

    <x-boton-atras :url="route('home')" />
    
    <section class="tituloInformes">
        <h1 class="medionegrita">Informes clínics</h1>
    </section>

    <section class="listaInformes">
        @if ($resultados->count())
            <div id="informesClinicos">
            
                    @foreach($resultados as $resultado)
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

</main>
@endsection
@extends('layouts.master')

@section('title', 'Informes Clínicos')
@section('descripcion_pagina', 'Lista de tus Informes Clínicos')

@section('content')

{{-- @dd($resultados); --}}
<main class="informesContainer">
    <section class="tituloInformes">
        <h1 class="medionegrita">Informes clínicos</h1>
    </section>

    <section class="listaInformes"> 
        <div id="informesClinicos">
            @foreach($resultados as $resultado)
                <informes-component :resultado='@json($resultado)'></informes-component>
            @endforeach

            @if ($resultados->count()) 
                <nav class="menu-paginacion">
                    {{ $resultados->links() }}
                </nav>  
            @endif
        </div>
    </section>
    
</main>
@endsection
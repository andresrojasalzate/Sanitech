@extends('layouts.master')

@section('title', 'Informes Clínicos')
@section('descripcion_pagina', 'Lista de tus Informes Clínicos')

@section('content')
<main class="informesContainer">
    <section class="tituloInformes">
        <h1 class="medionegrita">Informes clínicos</h1>
    </section>

    <section class="listaInformes"> 
        <div class="informe">
            <div class="informe-parte1">
                <p class="medionegrita">Nombre Prueba</p>
                <p>00-00-0000</p>
            </div>
            <div class="informe-parte2">
                <i class="fa-solid fa-chevron-right fa-2xl"></i>
            </div>   
        </div>
    </section>
    
</main>
@endsection
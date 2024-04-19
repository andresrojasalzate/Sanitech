<template>
    <div class="formulario-titulo">
      <h1>Cita amb el metge</h1>
      <h4>Soliciti una cita amb el metge</h4>
    </div>
  
    <div class="formulario">
      <!-- Dia y hora de la cita -->
      <div class="">
        <label>1. Seleccioni el dia i l'hora de la cita</label>
        <VueDatePicker v-model="date" :disabled-dates="diasNoDisponibles" :time-picker="false"></VueDatePicker>
      </div>
  
      <!-- Motivo de la visita -->
      <div class="">
        <label>2. Indiqui el motiu de la visita</label>
        <textarea class="input" type="text"></textarea>
      </div>
    </div>
  </template>
  
  <script>
  import VueDatePicker from '@vuepic/vue-datepicker';
  import '@vuepic/vue-datepicker/dist/main.css'
  
  export default {
    props: ['diasNoDisponibles'],
    components: { VueDatePicker },
    data() {
      return {
        date: null,
      };
    },
  }
  </script>
  
<template>
      <label for="">La cita tindrà una prova?</label>
      <p class="medionegrita errorCrearCita" v-if="errortipo">{{ errortipo }}</p>
      <div class="selecionTipoCita">
        <input type="radio" name="citaPrueba" id="nivel1" value="Si" @change="mostrarPrueba"  :checked="valortipo === 'Si'">
        <label for="nivel1">Si</label>
        <input type="radio" name="citaPrueba" id="nivel2" value="No" @change="ocultarPrueba"  :checked="valortipo === 'No'">
        <label for="nivel2">No</label>
      </div>
     
      <div class="selectorPrueba" v-if="mostrarSelectorPrueba">
        <label for="nombrePaciente">Selecciona la prova per a la cita:</label>
        <p class="medionegrita errorCrearCita" v-if="errorprueba">{{ errorprueba }}</p>
        <select name="prueba_id" id="algo">
          <option value="" disabled selected>Escull una prova...</option>
          <option v-for="prueba in pruebas" :key="prueba.id" :value="prueba.id" :selected="valorPruebaLocal == prueba.id">{{ prueba.name }}</option>
        </select>
      </div>
   
  </template>
  
  <script>
  export default {
    props: ['pruebas', 'errortipo', 'errorprueba', 'valortipo', 'valorprueba'],
    data() {
      return {
        mostrarSelectorPrueba: this.valortipo === 'Si',
        valorPruebaLocal: this.valorprueba
    
      };
    },
    methods: {
      mostrarPrueba() {
        this.mostrarSelectorPrueba = true;
      },
      ocultarPrueba() {
        this.mostrarSelectorPrueba = false;
        this.valorPruebaLocal = '';       
      }
    }
  };
  </script>
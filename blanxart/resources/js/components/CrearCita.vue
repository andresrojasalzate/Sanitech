<template>
  <label for="">La cita tindrà una prova?</label>
  <p class="medionegrita errorCrearCita" v-if="errortipo">{{ errortipo }}</p>

  <div class="selecionTipoCita">
    <label class="switch">
      <input type="checkbox" name="citaPrueba" @change="togglePrueba" :checked="valortipo === 'Si'">
      <span class="slider round"></span>
    </label>
  </div>

  <div class="selectorPrueba" v-if="mostrarSelectorPrueba">
    <label for="nombrePaciente">Selecciona la prova per a la cita:</label>
    <p class="medionegrita errorCrearCita" v-if="errorprueba">{{ errorprueba }}</p>
    <select name="prueba_id" id="algo">
      <option value="" disabled selected>Escull una prova...</option>
      <option v-for="prueba in pruebas" :key="prueba.id" :value="prueba.id" :selected="valorPruebaLocal == prueba.id">{{
        prueba.name }}</option>
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
    togglePrueba(event) {
      this.mostrarSelectorPrueba = event.target.checked;
      this.valortipo = event.target.checked ? 'Si' : 'No';
      if (!event.target.checked) {
        this.valorPruebaLocal = '';
      }
    }
  }
};
</script>
<template>

  <div class="formulario-2-columns">
    <div class="form-group" id="form-group-1">
      <label for="datepicker">1. Seleccioni la data de cita:</label>
      <input type="date" v-model="selectedDate" class="datepicker" name="fecha" required>
    </div>

    <div class="form-group" id="form-group-2">
      <label for="timepicker">2. Seleccioni la hora de cita:</label>
      <select v-model="selectedTime" class="select" name="hora" required>
        <option value="">Selecciona una hora</option>
        <option v-for="hour in availableHours" :value="hour">{{ hour }}</option>
      </select>
    </div>
  </div>

  <div class="form-group" id="form-group-3">
    <label for="descripcion">3. Motiu de la visita:</label>
    <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
  </div>

  <!-- Input oculto para el ID de la cita -->
  <input type="hidden" v-model="citaId">
</template>

<script>
export default {
  props: ['medicos', 'cita_id', 'user_id'],
  data() {
    return {
      selectedDate: '',
      selectedTime: '',
      availableHours: '',
      url: '/api/consultarFecha',
      user_id: this.user_id
    };
  },
  watch: {
    selectedDate: {
      handler: 'consultarFecha',
      immediate: false
    }
  },
  methods: {
    async consultarFecha() {
      try {
        const response = await fetch(this.url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json'
          },
          body: new URLSearchParams({
            'fecha': this.selectedDate,
            'user_id': this.user_id
          })
        });

        if (!response.ok) {
          throw new Error('Network response was not ok');
        }

        const data = await response.json();
        console.log(data);
        this.availableHours = data;
        // this.medicosEncontrados = data.length;
        // this.busquedaRealizada = true;
      } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
      }
    }
  }
}
</script>

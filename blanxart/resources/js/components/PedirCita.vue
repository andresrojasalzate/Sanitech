<template>

  <div class="formulario-2-columns">
    <div class="form-group" id="form-group-1">
      <label for="datepicker">1. Seleccioni la data de cita:</label>
      <input type="date" v-model="selectedDate" class="datepicker" name="fecha" :min="minDate" required>
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
  props: ['medicos', 'cita_id'],
  data() {
    return {
      selectedDate: '',
      selectedTime: '',
      minDate: '',
      availableHours: ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'],
    };
  },
  mounted() {
    this.setMinDate();
  },
  methods: {
    setMinDate() {
      const today = new Date();
      const day = String(today.getDate()).padStart(2, '0');
      const month = String(today.getMonth() + 1).padStart(2, '0');
      const year = today.getFullYear();
      this.minDate = `${year}-${month}-${day}`;
    }
  }
};
</script>

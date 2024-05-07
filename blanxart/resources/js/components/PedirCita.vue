<template>
  <div>
    <div class="formulario-2-columns">
      <div class="form-group">
        <label for="datepicker">1. Seleccioni la data de cita:</label>
        <input type="date" v-model="selectedDate" class="datepicker" name="fecha" required>
      </div>

      <div class="form-group">
        <label for="timepicker">2. Seleccioni la hora de cita:</label>
        <select v-model="selectedTime" class="select" name="hora" required>
          <option value="">Selecciona una hora</option>
          <option v-for="hour in availableHours" :value="hour">{{ hour }}</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="descripcion">5. Missatge per al pacient:</label>
      <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
    </div>

    <!-- Input oculto para el ID de la cita -->
    <input type="hidden" v-model="citaId">
  </div>
</template>

<script>
export default {
  props: ['medicos', 'cita_id'],
  data() {
    return {
      selectedSpeciality: '',
      selectedDoctor: '',
      selectedDate: '',
      selectedTime: '',
      uniqueSpecialities: [],
      availableHours: ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'],
      citaId: this.cita_id
    };
  },
  computed: {
    filteredDoctors() {
      if (!this.selectedSpeciality) return [];
      return this.medicos.filter(medico => medico.speciality === this.selectedSpeciality);
    }
  },
  methods: {
    filterDoctors() {
      this.selectedDoctor = ''; // Reset selected doctor when changing speciality
    },
  },
  mounted() {
    // Obtener lista de especialidades únicas
    this.uniqueSpecialities = [...new Set(this.medicos.map(medico => medico.speciality))];
  }
};
</script>

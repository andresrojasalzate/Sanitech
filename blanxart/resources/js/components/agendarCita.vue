<template>
  <div>
    <div class="form-group">
      <label for="speciality">1. Seleccioni la especialitat:</label>
      <select v-model="selectedSpeciality" @change="filterDoctors" class="select" required>
        <option value="">Selecciona una especialitat</option>
        <option v-for="speciality in uniqueSpecialities" :key="speciality" :value="speciality">{{ speciality }}</option>
      </select>
    </div>

    <div class="form-group">
      <label for="doctor">2. Seleccioni el metge:</label>
      <select v-model="selectedDoctor" class="select" name="medico" required>
        <option value="">Selecciona un metge</option>
        <option v-for="doctor in filteredDoctors" :key="doctor.id" :value="doctor.id">
          {{ doctor.user.name }} {{ doctor.user.lastName }} - {{ doctor.collegiate_number }}
        </option>
      </select>
    </div>

    <div class="formulario-2-columns">
      <div class="form-group">
        <label for="datepicker">3. Seleccioni la data de cita:</label>
        <input type="date" v-model="selectedDate" class="datepicker" name="fecha" :min="minDate" required>
      </div>

      <div class="form-group">
        <label for="timepicker">4. Seleccioni la hora de cita:</label>
        <select v-model="selectedTime" class="select" name="hora" required>
          <option value="">Selecciona una hora</option>
          <option v-for="hour in availableHours" :key="hour" :value="hour">{{ hour }}</option>
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
  props: ['medicos', 'cita_id', 'datos_cita'],
  data() {
    return {
      selectedSpeciality: '',
      selectedDoctor: '',
      selectedDate: '',
      selectedTime: '',
      uniqueSpecialities: [],
      availableHours: ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'],
      citaId: this.cita_id,
      minDate: ''
    };
  },
  computed: {
    filteredDoctors() {
      if (!this.selectedSpeciality) return [];
      return this.medicos.filter(medico => medico.speciality === this.selectedSpeciality);
    }
  },
  mounted() {
    this.setMinDate();
    this.uniqueSpecialities = [...new Set(this.medicos.map(medico => medico.speciality))];
    this.selectedSpeciality = this.datos_cita?.speciality || '';
    this.selectedDoctor = this.datos_cita?.medico_id || '';
    this.selectedDate = this.datos_cita?.date || '';
    this.selectedTime = this.datos_cita?.time || '';
  },
  methods: {
    filterDoctors() {
      this.selectedDoctor = ''; // Reset selected doctor when changing speciality
    },
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

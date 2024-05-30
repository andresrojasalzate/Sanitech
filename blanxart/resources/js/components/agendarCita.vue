<template>

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
    <div class=" form-group" id="form-group-1">
      <label for="datepicker">3. Seleccioni la data de cita:</label>
      <input type="date" v-model="selectedDate" class="datepicker" name="fecha" :min="minDate" required>
    </div>

    <div class="form-group" id="form-group-2">
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
      availableHours: '',
      citaId: this.cita_id,
      url: '/api/consultarFechaAsignar',,
      minDate: ''
    };
  },
  computed: {
    filteredDoctors() {
      if (!this.selectedSpeciality) return [];
      return this.medicos.filter(medico => medico.speciality === this.selectedSpeciality);
    }
  },
  watch: {
    selectedDate: {
      handler: 'consultarFechaAsignar',
      immediate: false
    }
  },
  methods: {
    async consultarFechaAsignar() {
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
            'medico': this.selectedDoctor
          })
        });

        if (!response.ok) {
          throw new Error('Network response was not ok');
        }

        const data = await response.json();
        // console.log(data);
        this.availableHours = data;
      } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
      }
    },
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

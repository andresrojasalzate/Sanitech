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
      <select v-model="selectedTime" class="select" name="hora" required :disabled="!fecha_no_disponible">
        <option value="">Selecciona una hora</option>
        <option v-for="hour in availableHours" :key="hour" :value="hour">{{ hour }}</option>
      </select>
    </div>
  </div>

  <Transition name="slide-fade">
    <div class=" alert alert-danger" v-if="!fecha_no_disponible">No hi ha cites disponibles per a aquest dia</div>
  </Transition>

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
      fecha_no_disponible: true,
      citaId: this.cita_id,
      url: '/api/consultarFechaAsignar',
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
    fechaNoDisponible() {
      if (this.availableHours.length === 0) {
        this.fecha_no_disponible = false;
      } else {
        this.fecha_no_disponible = true;
      }
    },
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
        this.fechaNoDisponible();
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
  },
  mounted() {
    this.setMinDate();
    this.uniqueSpecialities = [...new Set(this.medicos.map(medico => medico.speciality))];
    this.selectedSpeciality = this.datos_cita?.speciality || '';
    this.selectedDoctor = this.datos_cita?.medico_id || '';
    this.selectedDate = this.datos_cita?.date || '';
    this.selectedTime = this.datos_cita?.time || '';
  },
};
</script>

<style>
.slide-fade-enter-active {
  /* transition: all .8s ease; */
  transition: all 250ms ease-in;
}

.slide-fade-leave-active {
  transition: all .5s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}

.slide-fade-enter,
.slide-fade-leave-to {
  transform: translateX(10px);
  opacity: 0;
}
</style>
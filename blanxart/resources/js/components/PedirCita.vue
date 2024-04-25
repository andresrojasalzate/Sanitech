<template>
    <div>
        <div class="formulario-2-columns">
            <div class="form-group">
                <label for="datepicker">1. Seleccioni el dia de la cita</label>
                <input type="date" v-model="selectedDate" class="datepicker" name="fecha" required>
            </div>

            <div class="form-group">
                <label>2. Seleccioni la hora</label>
                <select>
                    <option value="">Seleccioni l'hora de la cita</option>
                    <option></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>3. Motiu de la visita</label>
            <textarea></textarea>
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
            horasDisponibles: [],
            horaSeleccionada: null
        };
    },

}
</script>

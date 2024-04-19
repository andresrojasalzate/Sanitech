<template>
    <div class="formulario-titulo">
        <h1>Cita amb el metge</h1>
        <h4>Soliciti una cita amb el metge</h4>
    </div>

    <div class="formulario">
        <div class="">
            <p>1. Seleccioni el dia de la cita</p>
            <VueDatePicker v-model="date"></VueDatePicker>
        </div>

        <div class="">
            <p>2. Seleccioni una hora</p>
            <input type="time">
        </div>

        <div class="">
            <p>3. Indiqui el motiu de la visita</p>
            <textarea></textarea>
        </div>
    </div>
</template>

<script>
    import VueDatePicker from '@vuepic/vue-datepicker';
    import '@vuepic/vue-datepicker/dist/main.css'

    export default {
    components: { VueDatePicker },
    data() {
        return {
        date: null,
        };
    }
    }
</script>
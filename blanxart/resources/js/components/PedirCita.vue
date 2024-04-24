<template>
    <VueDatePicker v-model="date" :disabled-dates="diasNoDisponibles" :time-picker="false"></VueDatePicker>
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
        };
    },
}
</script>

<template>
    <div class="contenedor-informe">
        <div class="informe" ref="informe" @click="seleccionado">
            <div class="informe-parte1">
                <p class="medionegrita titulo-informe" ref="primerParrafo">{{ cita.name }} {{ cita.lastName }}</p>
                <p>{{ cita.date }}</p>
            </div>
            <div class="informe-parte2">
                <Transition name="fade-acordeon" mode="out-in">
                    <i class="fa-solid fa-chevron-right fa-2xl" v-if="clickado"></i>
                    <i class="fa-solid fa-angle-down fa-2xl" v-else=""></i>
                </Transition>
            </div>
        </div>
        <transition name="slide-fade-acordeon">
            <div class="cuerpo-informe" v-if="!clickado">
                <p class="medionegrita cuerpo-informe-titulo">Hora</p>
                <p class="cuerpo-informe-texto">{{ cita.time }}</p>
                <p class="medionegrita cuerpo-informe-titulo">Motiu</p>
                <p class="cuerpo-informe-texto">{{ cita.reason }}</p>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    props: ['cita'],
    data() {
        return {
            informeColor: 'white',
            clickado: true,
        };
    },
    methods: {
        seleccionado() {
            this.clickado = !this.clickado;

            if (this.clickado) {
                this.$refs.informe.style.backgroundColor = '';
                this.$refs.primerParrafo.style.marginBottom = '3vh';
                this.$refs.primerParrafo.style.marginTop = '0';

            } else {
                this.$refs.informe.style.backgroundColor = '#E3E5FA';
                this.$refs.primerParrafo.style.marginBottom = '6vh';
                this.$refs.primerParrafo.style.marginTop = '3vh';
            }
        },
    }
}
</script>
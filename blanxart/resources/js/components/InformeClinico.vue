<template>
    <div class="contenedor-informe" ref="contenedorInforme">
        <div class="informe"  ref="informe":style="{ backgroundColor: informeColor }">
                <div class="informe-parte1">
                    <p class="medionegrita" ref="primerParrafo">{{cita.prueba.nombre}}</p>
                    <p>{{cita.fecha}}</p>
                </div>
                <div class="informe-parte2" @click="seleccionado">
                    <i class="fa-solid fa-chevron-right fa-2xl" v-if="clickado"></i>
                    <i class="fa-solid fa-angle-down fa-2xl" v-else=""></i>
                </div>   
        </div>
        <div class="cuerpo-informe" v-if="!clickado">
            <p class="medionegrita cuerpo-informe-titulo">Diagnóstico</p>
            <p class="cuerpo-informe-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod  tempor incididunt ut labore et dolore magna aliqua.</p>
            <p class="medionegrita cuerpo-informe-titulo">Servicio</p>
            <p class="cuerpo-informe-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p class="medionegrita cuerpo-informe-titulo">Centro</p> 
            <p class="cuerpo-informe-texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['cita'],
    data() {
        return {
            informeColor: 'white', 
            clickado:  true,
        };
    },
    methods: {
        seleccionado() {
            this.clickado = !this.clickado;

            if (this.clickado) {
                this.informeColor = 'white';
                this.$refs.primerParrafo.style.marginBottom = '3%';
                this.$refs.primerParrafo.style.marginTop = '0'; 
                this.$refs.contenedorInforme.style.marginBottom = '0';
               
            } else {
                this.informeColor = '#E3E5FA'; 
                this.$refs.primerParrafo.style.marginBottom = '13%'; 
                this.$refs.primerParrafo.style.marginTop = '3%';  
                this.$refs.contenedorInforme.style.marginBottom = '5%';
            }
        }
    }
}
</script>
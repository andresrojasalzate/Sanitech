<template>
    <div class="contenedor-informe">
        <div class="informe" ref="informe" @click="seleccionado">
            <div class="informe-parte1">
                <p class="medionegrita titulo-informe" ref="primerParrafo">{{ resultado.prueba }}</p>
                <p>{{ formatCreatedAt(resultado.created_at) }}</p>
            </div>
            <div class="informe-parte2">
                <i class="fa-solid fa-chevron-right fa-2xl" v-if="clickado"></i>
                <i class="fa-solid fa-angle-down fa-2xl" v-else=""></i>
            </div>
        </div>
        <div class="cuerpo-informe" ref="desplegable" :style="{ maxHeight: clickado ? '0' : '1000px' }">
            <p class="medionegrita cuerpo-informe-titulo">Resultat</p>
            <p class="cuerpo-informe-texto">{{ resultado.resultado }}</p>
            <p class="medionegrita cuerpo-informe-titulo">Servei</p>
            <p class="cuerpo-informe-texto">{{ resultado.servicio }}</p>
            <p class="medionegrita cuerpo-informe-titulo">Centre</p>
            <p class="cuerpo-informe-texto">{{ resultado.centro }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['resultado'],
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
                this.$refs.desplegable.style.paddingTop = '0';
                this.$refs.desplegable.style.paddingBottom = '0';
               
            } else {
                this.$refs.informe.style.backgroundColor = '#E3E5FA';
                this.$refs.desplegable.style.paddingTop = '5%';
                this.$refs.desplegable.style.paddingBottom = '10%';
                
            }
        },
        formatCreatedAt(createdAt) {
            const currentDate = new Date();
            const createdDate = new Date(createdAt);
            const options = { month: 'long', day: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric' };

            if (currentDate.getFullYear() === createdDate.getFullYear()) {
                if (currentDate.getMonth() === createdDate.getMonth() && currentDate.getDate() === createdDate.getDate()) {
                    // Mismo día
                    return createdDate.toLocaleTimeString('ca-ES', { hour: 'numeric', minute: 'numeric' });
                } else {
                    // Mismo año, pero diferente día
                    return createdDate.toLocaleDateString('ca-ES', { month: 'long', day: 'numeric' });
                }
            } else {
                // Diferente año
                return createdDate.toLocaleDateString('ca-ES', { year: 'numeric', month: 'long', day: 'numeric' });
            }
        },
    }
}
</script>
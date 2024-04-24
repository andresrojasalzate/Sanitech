<template>
    <div class="agenda-container">
        <div class="citas-title">
            <h2>Pedir justificante</h2>
        </div>

        <div class="citas-table">
            <p v-if="citasRealizadas.length > 0">
                Citas encontradas: {{ citasRealizadas.length }}
            </p>
            <table v-if="citasRealizadasPaginadas.length > 0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Fetxa</th>
                        <th>Generar justificant</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in citasRealizadasPaginadas" :key="item.id">
                        <td>{{ item.name }}</td>
                        <td>{{ item.date }}</td>
                        <td><a @click="navegarAJustificante(item.id)"><i
                                    class="fa-solid fa-file-pdf icon icon-blue"></i></a></td>
                    </tr>
                </tbody>
            </table>
            <div v-else>
                <p class="no-citas">No has fet .</p>
            </div>
            <div class="paginacion">
                <button @click="paginaActual -= 1" :disabled="paginaActual === 1"><i
                        class='fas fa-chevron-left'></i></button>
                <div class="paginas">
                    <button v-for="pagina in paginasMostradas" :key="pagina" @click="paginaActual = pagina"
                        :class="{ 'pagina-actual': pagina === paginaActual }">{{ pagina }}</button>
                </div>
                <button @click="paginaActual += 1" :disabled="paginaActual === totalPaginas" class="ant-sig"><i
                        class='fas fa-chevron-right'></i></button>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    props: ['citas'],
    data() {
        return {
            elementosPorPagina: 4,
            paginaActual: 1
        };
    },
    mounted() {
        console.log(this.citas);
    },
    computed: {
        citasRealizadas() {
            this.paginaActual = 1;
            return this.citas.filter(cita => cita.done === true);
        },
        totalPaginas() {
            return Math.ceil(this.citasRealizadas.length / this.elementosPorPagina);
        },
        citasRealizadasPaginadas() {
            const inicio = (this.paginaActual - 1) * this.elementosPorPagina;
            const fin = this.paginaActual * this.elementosPorPagina;
            return this.citasRealizadas.slice(inicio, fin);
        },
        paginasMostradas() {
            const paginas = [];
            const paginaInicio = Math.max(1, this.paginaActual - 2);
            const paginaFin = Math.min(this.totalPaginas, this.paginaActual + 2);
            for (let i = paginaInicio; i <= paginaFin; i++) {
                paginas.push(i);
            }
            return paginas;
        },

    },

    methods: {
        navegarAJustificante(idCita) {
            window.location.href = `/generarJustificante/${idCita}`;
        }
    }

}
</script>

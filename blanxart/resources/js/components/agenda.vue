<template>
    <div class="agenda-container">
        <div class="citas-title">
            <h2>Agenda</h2>
        </div>
        <div class="citas-type">
            <label>tipo de cita</label>
            <select v-model="opcionSeleccionada">
                <option value="realizadas">Citas realizadas</option>
                <option value="no_realizadas">Citas no realizadas</option>
                <option value="pendientes_citar">Citas pendientes por citar</option>
            </select>
        </div>

        <div class="citas-table">
            <p v-if="citasFiltradas.length > 0">
                Citas encontradas: {{ citasFiltradas.length }}
            </p>
            <table v-if="citasFiltradasPaginadas.length > 0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Adjuntos</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in citasFiltradasPaginadas" :key="item.id">
                        <td>{{ item.nombre }}</td>
                        <td><a :href="item.documento"><i class="fa-solid fa-file-pdf icon icon-blue"></i></a></td>
                        <td>{{ item.fecha }}</td>
                    </tr>
                </tbody>
            </table>
            <div v-else>
                <p class="no-citas">No hay citas disponibles.</p>
            </div>
            <div class="paginacion">
                <button @click="paginaActual -= 1" :disabled="paginaActual === 1"><i class='fas fa-chevron-left'></i></button>
                <div class="paginas">
                    <button v-for="pagina in paginasMostradas" :key="pagina" @click="paginaActual = pagina"
                        :class="{ 'pagina-actual': pagina === paginaActual }">{{ pagina }}</button>
                </div>
                <button @click="paginaActual += 1" :disabled="paginaActual === totalPaginas"
                    class="ant-sig"><i class='fas fa-chevron-right'></i></button>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    props: ['citas'],
    data() {
        return {
            opcionSeleccionada: 'realizadas',
            elementosPorPagina: 4,
            paginaActual: 1
        };
    },
    computed: {
        citasFiltradas() {
            if (this.opcionSeleccionada === 'realizadas') {
                return this.citas.filter(cita => cita.realizada === true);
            } else if (this.opcionSeleccionada === 'no_realizadas') {
                return this.citas.filter(cita => cita.realizada === false && cita.fecha !== null);
            } else if (this.opcionSeleccionada === 'pendientes_citar') {
                return this.citas.filter(cita => cita.fecha === null);
            }
            return [];
        },
        totalPaginas() {
            return Math.ceil(this.citasFiltradas.length / this.elementosPorPagina);
        },
        citasFiltradasPaginadas() {
            const inicio = (this.paginaActual - 1) * this.elementosPorPagina;
            const fin = this.paginaActual * this.elementosPorPagina;
            return this.citasFiltradas.slice(inicio, fin);
        },
        paginasMostradas() {
            const paginas = [];
            const paginaInicio = Math.max(1, this.paginaActual - 2);
            const paginaFin = Math.min(this.totalPaginas, this.paginaActual + 2);
            for (let i = paginaInicio; i <= paginaFin; i++) {
                paginas.push(i);
            }
            return paginas;
        }
    }
}
</script>

<style>


</style>


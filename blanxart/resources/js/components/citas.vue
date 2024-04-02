<template>
    <div>
        <h1>Agenda</h1>
        <select v-model="opcionSeleccionada">
            <option value="realizadas">Citas realizadas</option>
            <option value="no_realizadas">Citas no realizadas</option>
            <option value="pendientes_citar">Citas pendientes por citar</option>
        </select>

        
        <p v-if="citasFiltradas.length > 0">
            Citas encontradas: {{ citasFiltradas.length }}
        </p>
        <table v-if="citasFiltradas.length > 0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Adjuntos</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in citasFiltradas" :key="item.id">
                    <td>{{ item.nombre }}</td>
                    <td>{{ item.documento }}</td>
                    <td>{{ item.fecha }}</td>
                </tr>
            </tbody>
        </table>
        <div v-else>
            <p>No hay citas disponibles.</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ['citas'],
    data() {
        return {
            opcionSeleccionada: 'realizadas'
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
        }
    }
}
</script>

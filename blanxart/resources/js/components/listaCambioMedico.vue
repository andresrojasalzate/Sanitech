<template>
    <div class="flex-center">
        <h2>Llistat de Cites</h2>
        <template v-if="listaPaginada.length > 0">
            <div class="tabla">
                <table class="citas-sin-asignar">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Cognom</th>
                            <th>Génere</th>
                            <th>Edat</th>
                            <th>DNI</th>
                            <th>CIP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-row" v-for="(item, index) in listaPaginada" :key="index"
                            @click="navigateToFormPage(item)">
                            <td>{{ item.name }}</td>
                            <td>{{ item.lastName }}</td>
                            <td>{{ item.genre }}</td>
                            <td>{{ calculateAge(item.birth_date) }}</td>
                            <td>{{ item.dni }}</td>
                            <td>{{ item.CIP }}</td>
                            
                        </tr>
                    </tbody>
                </table>
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
        </template>
        <template v-else>
            <p style="color: red;">No hi ha cap item pendent d'asignar</p>
        </template>
    </div>
</template>

<script>
export default {
    props: {
        lista: Array,
    },
    data() {
        return {
            elementosPorPagina: 5,
            paginaActual: 1
        };
    },
    computed: {
        totalPaginas() {
            return Math.ceil(this.lista.length / this.elementosPorPagina);
        },
        listaPaginada() {
            const inicio = (this.paginaActual - 1) * this.elementosPorPagina;
            const fin = this.paginaActual * this.elementosPorPagina;
            return this.lista.slice(inicio, fin);
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
        formatDate(dateString) {
            const parts = dateString.split('/');
            return parts[2] + '-' + parts[1] + '-' + parts[0];
        },
        calculateAge(birthDateString) {
            const birthDate = new Date(this.formatDate(birthDateString));
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const month = today.getMonth() - birthDate.getMonth();
            if (month < 0 || (month === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            return age;
        },
        navigateToFormPage(item) {
            window.location.href = `/cambiar-medico/peticion/${item.id}/`;
        }
    }
};
</script>
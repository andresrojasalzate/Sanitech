<template>
    <div class="contenedorFiltro">
        <input type="text" name="" id="input-id" placeholder="Buscar paciente..." @keyup.enter="buscarPacientes">
        <p class="medionegrita" v-if="pacientesEncontrados > 0">Pacientes encontrados: {{ pacientesEncontrados }}</p>
    </div>
    <div class="pacientesNoDisponibles" v-if="users.length === 0 || (pacientesEncontrados === 0 && busquedaRealizada === true)">
        <p class="medionegrita">No se encontraron pacientes.</p>
    </div>
    <div class="pacientenesEncontrados" :style="{ 'margin-top': busquedaRealizada ? '0' : '11vh' }">
        <a v-for="user in users" :key="user.id" :href="'/'+ this.accion + '/' + user.paciente.id">
            <div class="paciente"  @click="redireccionar(user)">
                <img src="https://toppng.com/public/uploads/preview/user-account-management-logo-user-icon-11562867145a56rus2zwu.png"
                    alt="" srcset="">
                <div class="pacienteInfo">
                    <p class="medionegrita">{{ user.name }} {{ user.lastName }}</p>
                     <p>CIF: {{ user.paciente.CIP }}</p>
                    <p>DNI: {{ user.dni }}</p>
                    <p>Telef: {{ user.phone_number }}</p>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    props: ['pacientes', 'idmedico', 'accion'],
    data() {
        return {
            users: this.pacientes,
            pacientesEncontrados: 0,
            busquedaRealizada: false
        }
    },
    methods: {
        buscarPacientes() {
            const inputValue = document.querySelector('#input-id').value;

            fetch(`http://127.0.0.1:8000/api/pacientes/${inputValue}/${this.idmedico}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    this.users = data;
                    this.pacientesEncontrados = data.length;
                    this.busquedaRealizada = true;
                })
                .catch(error => {
                    console.error(error);
                });
        },

        redireccionar(user) {
            this.$router.push(`/${this.accion}/${user.paciente.id}`);
        }
    }

}
</script>
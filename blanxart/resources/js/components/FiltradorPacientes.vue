<template>
    <div class="contenedorFiltro">
        <input type="text" name="" id="input-id" placeholder="Buscar paciente..." @keyup.enter="buscarPacientes">
        <p class="medionegrita">Pacientes encontrados: {{ pacientesEncontrados }}</p>
    </div>
    <div class="pacientenesEncontrados">
        <div class="paciente" v-for="user in users" :key="user.id">
            <img src="https://toppng.com/public/uploads/preview/user-account-management-logo-user-icon-11562867145a56rus2zwu.png"
                alt="" srcset="">
            <div class="pacienteInfo">
                <p class="medionegrita">{{ user.name }} {{ user.lastName }}</p>
                <p>CIF: {{ user.paciente.CIP }}</p>
                <p>DNI: {{ user.dni }}</p>
                <p>Telef: {{ user.phone_number }}</p>
            </div>
            <div class="pacienteBotones">
                <a :href="'/crearCita/' + user.id">
                    <button>Crear cita</button>
                </a>
                <a href="">
                    <button>Consultar pruebas</button>
                </a>
                <a href="">
                    <button>Consultar resultados</button>
                </a>
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            users: [],
            pacientesEncontrados: 0
        }
    },
    methods: {
        buscarPacientes() {
            const inputValue = document.querySelector('#input-id').value;

            fetch(`http://127.0.0.1:8000/api/pacientes/${inputValue}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    this.users = data;
                    this.pacientesEncontrados = data.length;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }

}
</script>
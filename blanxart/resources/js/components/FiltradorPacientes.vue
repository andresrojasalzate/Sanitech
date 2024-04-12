<template>
    <div class="contenedorFiltro">
        <input type="text" name="" id="input-id" placeholder="Buscar paciente..." @keyup.enter="buscarPacientes">
        <p>Pacientes encontrados: {{ pacientesEncontrados }}</p>
    </div>
    <div class="pacientenesEncontrados">
        <div class="paciente" v-for="paciente in pacientes" :key="paciente.id">
            <p>{{ paciente.name }} {{ paciente.lastName }}</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            pacientes: [],
            pacientesEncontrados: 0
        }
    },
    methods: {
        buscarPacientes() {
            const inputValue = document.querySelector('#input-id').value;
            
            fetch(`http://127.0.0.1:8000/api/pacientes/${inputValue}`)
                .then(response => response.json())
                .then(data => {
                    this.pacientes = data;
                    this.pacientesEncontrados = data.length;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    }

}
</script>
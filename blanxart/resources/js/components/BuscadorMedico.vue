<template>
    <div class="contenedorFiltro">
        <input type="text" name="" id="input-id" placeholder="Buscar metges..." v-model="parametroBusqueda">
        <p class="medionegrita" v-if="medicosEncontrados > 0">Metges trobats: {{ medicosEncontrados }}</p>
    </div>
    <div class="pacientesNoDisponibles"
        v-if="users.length === 0 || (medicosEncontrados === 0 && busquedaRealizada === true)">
        <p class="medionegrita">No es van trobar metges.</p>
    </div>
    <div class="pacientenesEncontrados" :style="{ 'margin-top': busquedaRealizada ? '0' : '11vh' }">
        <a v-for="user in users" :key="user.id" :href="'/' + this.accion + '/' + user.id">
            <div class="paciente" @click="redireccionar(user)">
                <i class="fa-solid fa-user"></i>
                <div class="pacienteInfo">
                    <p class="medionegrita">{{ user.name }} {{ user.lastName }}</p>
                    <p>Especialitat : {{ user.speciality }}</p>
                    <!-- <p>DNI: {{ user.dni }}</p> -->
                    <p>Nro. Col·legiat: {{ user.collegiate_number }}</p>
                </div>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    props: ['medicos', 'accion', 'apikey'],
    data() {
        return {
            users: this.medicos,
            MedicosEncontrados: 0,
            busquedaRealizada: false,
            parametroBusqueda: '',
            url: '/api/filtradorMedico'
        }
    },
    watch: {
        parametroBusqueda: {
            handler: 'buscarMedicos',
            immediate: true // Llama a buscarMedicos al inicio
        }
    },
    methods: {
        async buscarMedicos() {
            try {
                const response = await fetch(this.url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Authorization': `Bearer ${this.apikey}`
                    },
                    body: new URLSearchParams({
                        'textoIntroducido': this.parametroBusqueda
                    })
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();
                // console.log(data);
                this.users = data;
                this.medicosEncontrados = data.length;
                this.busquedaRealizada = true;
            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }
    }

}
</script>
<template>
    <div>
        <form class="formulario-cambio-medico-admin" action="/cambiar-medico/peticion/solucion" method="post">
            <input type="hidden" name="_token" :value="csrfToken">
            <input type="hidden" name="idPaciente" :value="idPaciente">
            <div class="botones-cambio-medico-admin">
                <button type="button" class="dialog-button-confirmar" @click="handleButtonClick('acceptar')">Acceptar</button>
                <button type="button" class="dialog-button-rechazar" @click="handleButtonClick('rechazar')">Rebutjar</button>
            </div>
            <input type="hidden" name="action" :value="action">
            <div id="rechazoCambioMedico" v-if="mostrarMotivoRechazo">
                <label for="motivoRechazo">Especifiqui el motiu de rebuig de la petició</label>
                <p v-if="errors.motivoRechazo">{{ errors.motivoRechazo[0] }}</p>
                <textarea name="motivoRechazo" placeholder="Motiu de rebuig de la petició..."></textarea>
            </div>
            <div id="aceptarCambioMedico" v-if="mostrarSelectMedico">
                <label for="nuevoMedico">Tria el nou metge</label>
                <p v-if="errors.nuevoMedico">{{ errors.nuevoMedico[0] }}</p>
                <select name="nuevoMedico">
                    <option value="" selected>Selecciona un metge</option>
                    <option v-for="medico in medicos" :key="medico.id" :value="medico.id">{{ medico.user.name }} 
                        {{ medico.user.lastName }} | {{ medico.speciality }} | {{ medico.collegiate_number }}</option>
                </select>
            </div>
            <button class="confirmar-btn" type="submit" v-if="mostrarFormulario">Enviar</button>
        </form>
    </div>
</template>

<script>
export default {
    props: ['medicos', 'csrfToken', 'idPaciente', 'errors'],
    data() {
        return {
            action: '',
            mostrarFormulario: false,
            mostrarMotivoRechazo: false,
            mostrarSelectMedico: false
        };
    },
    mounted() {
        if (this.errors.nuevoMedico) {
            this.mostrarSelect();
        }
        if (this.errors.motivoRechazo) {
            this.mostrarTextarea();
        }
    },
    methods: {
        handleButtonClick(actionType) {
            this.action = actionType;
            if (actionType === 'acceptar') {
                this.mostrarSelect();
            } else if (actionType === 'rechazar') {
                this.mostrarTextarea();
            }
        },
        mostrarSelect() {
            this.mostrarFormulario = true;
            this.mostrarSelectMedico = true;
            this.mostrarMotivoRechazo = false;
        },
        mostrarTextarea() {
            this.mostrarFormulario = true;
            this.mostrarSelectMedico = false;
            this.mostrarMotivoRechazo = true;
        }
    }
};
</script>

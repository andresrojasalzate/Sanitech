<template>
    <div>
        <form class="formulario-cambio-medico-admin" action="" method="post">
            <div class="botones-cambio-medico-admin">
                <button type="button" class="dialog-button-confirmar" @click="handleButtonClick('acceptar')">Acceptar</button>
                <button type="button" class="dialog-button-rechazar" @click="handleButtonClick('rechazar')">Rebutjar</button>
            </div>
            <input type="hidden" name="action" :value="action">
            <label for="motivoRechazo" v-if="mostrarMotivoRechazo">Especifiqui el motiu de rebuig de la petició</label>
            <textarea name="motivoRechazo" placeholder="Motiu de rebuig de la petició..." v-if="mostrarMotivoRechazo"></textarea>
            <label for="nuevoMedico" v-if="mostrarSelectMedico">Tria el nou metge</label>
            <select name="nuevoMedico" v-if="mostrarSelectMedico">
                <option value="" selected>Selecciona un metge</option>
                <option v-for="medico in medicos" :key="medico.id" :value="medico.id">{{ medico.user.name}} 
                    {{ medico.user.lastName }} | {{ medico.speciality }} | {{ medico.collegiate_number }}</option>
            </select>
            <button class="confirmar-btn" type="submit" v-if="mostrarFormulario">Enviar</button>
        </form>
    </div>
</template>

<script>
export default {
    props: ['medicos'],
    data() {
        return {
            action: '',
            mostrarFormulario: false,
            mostrarMotivoRechazo: false,
            mostrarSelectMedico: false
        };
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

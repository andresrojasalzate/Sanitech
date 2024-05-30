<template>

  <div class="notificacion-title">
    <h2>Notificacions</h2>
    <p>Consulta els teus recordatoris i accepta o rebutjar les  proves</p>
  </div>
  <div class="notificaciones-container">
    <div v-for="item in notificaciones" :key="item.id" class="notificacion-card">
      <div class="notificacion-content">
        <div class="notificacion-header">
          <h3>{{ item.title }}</h3>
        </div>
        <div class="notificacion-body">
          <p>{{ item.descripcion }}</p>
        </div>
      </div>
      
      <div class="fecha">{{ formatCreatedAt(item.created_at) }}</div>
      <button v-if="item.accepted === null && item.tipo === 'Confirmacion'" @click="mostrarDialogo(item.cita_id)"
        class="confirmar-btn">Resposta</button>
      <p v-else-if="item.accepted === false && item.tipo === 'Confirmacion'" class="rechazado">Cita rebutjada</p>
      <p v-else-if="item.accepted === true && item.tipo === 'Confirmacion'" class="aceptado">Cita acceptada</p>

      <div v-if="showDialog" class="dialog-overlay">
        <div class="dialog">

          <p>Podrà assistir a aquesta cita?</p>
          <button class="dialog-button dialog-button-confirmar" @click="confirmar">Sí</button>
          <button class="dialog-button dialog-button-rechazar" @click="cancelar">No</button>
        </div>
        <button class="cerrar-btn" @click="cerrarDialogo">Tancar</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['notificaciones'],
  data() {
    return {
      showDialog: false,
      citaId: null
    };
  },
  methods: {
    formatCreatedAt(createdAt) {
      const currentDate = new Date();
      const createdDate = new Date(createdAt);
      const options = { month: 'long', day: 'numeric', year: 'numeric', hour: 'numeric', minute: 'numeric' };

      if (currentDate.getFullYear() === createdDate.getFullYear()) {
        if (currentDate.getMonth() === createdDate.getMonth() && currentDate.getDate() === createdDate.getDate()) {
          // Mismo día
          return createdDate.toLocaleTimeString('ca-ES', { hour: 'numeric', minute: 'numeric' });
        } else {
          // Mismo año, pero diferente día
          return createdDate.toLocaleDateString('ca-ES', { month: 'long', day: 'numeric' });
        }
      } else {
        // Diferente año
        return createdDate.toLocaleDateString('ca-ES', { year: 'numeric', month: 'long', day: 'numeric' });
      }
    },
    mostrarDialogo(citaId) {
      this.showDialog = true;
      this.citaId = citaId; // Guarda el ID de la cita para usarlo en las funciones confirmar y cancelar
    },
    cerrarDialogo() {
      this.showDialog = false;
    },
    confirmar() {
      console.log(this.citaId);
      window.location.href = '/respuestaCita/'+this.citaId+'/'+true;
    },
    cancelar() {
      console.log(this.citaId);
      window.location.href = '/respuestaCita/'+this.citaId+'/'+false;
    }
  }
};
</script>

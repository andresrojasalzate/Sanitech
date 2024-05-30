<template>
  <div class="flex-center">
    <h2>Llistat de Cites</h2>
    <p>Aquí pots veure totes les cites</p>
    <template v-if="citasPaginadas.length > 0">
      <div class="tabla">
        <table class="citas-sin-asignar">
          <thead>
            <tr>
              <th>Nivell d'emergencia</th>
              <th>Nom</th>
              <th>Cognom</th>
              <th>Génere</th>
              <th>Edat</th>
              <th>DNI</th>
              <th>CIP</th>
              <th>Nom prova</th>
            </tr>
          </thead>
          <tbody>
            <tr class="table-row" v-for="(cita, index) in citasPaginadas" :key="index"
              @click="navigateToDetailPage(cita)">
              <td>{{ cita.emergency_level }}</td>
              <td>{{ cita.name }}</td>
              <td>{{ cita.lastName }}</td>
              <td>{{ cita.genre }}</td>
              <td>{{ calculateAge(cita.birth_date) }}</td>
              <td>{{ cita.dni }}</td>
              <td>{{ cita.CIP }}</td>
              <td>{{ cita.nombrePrueba }}</td>
            </tr>
          </tbody>
        </table>
      </div>


      <div class="paginacion">
        <button @click="paginaActual -= 1" :disabled="paginaActual === 1"><i class='fas fa-chevron-left'></i></button>
        <div class="paginas">
          <button v-for="pagina in paginasMostradas" :key="pagina" @click="paginaActual = pagina"
            :class="{ 'pagina-actual': pagina === paginaActual }">{{ pagina }}</button>
        </div>
        <button @click="paginaActual += 1" :disabled="paginaActual === totalPaginas" class="ant-sig"><i
            class='fas fa-chevron-right'></i></button>
      </div>
    </template>
    <template v-else>
      <p style="color: red;">No hi ha cap cita pendent d'asignar</p>
    </template>
  </div>
</template>

<script>
export default {
  props: {
    citas: Array,
  },
  data() {
    return {
      elementosPorPagina: 5,
      paginaActual: 1
    };
  },
  computed: {
    totalPaginas() {
      return Math.ceil(this.citas.length / this.elementosPorPagina);
    },
    citasPaginadas() {
      const inicio = (this.paginaActual - 1) * this.elementosPorPagina;
      const fin = this.paginaActual * this.elementosPorPagina;
      return this.citas.slice(inicio, fin);
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
    navigateToDetailPage(cita) {
      const citaId = cita.id;
      const name = cita.name;
      const emergency_level = cita.emergency_level;
      const nombrePrueba = cita.nombrePrueba;
      const ruta = 'asignarFechaCita';
      window.location.href = `/asignarFechaCita/cita/${citaId}/${ruta}/${name}/${emergency_level}/${nombrePrueba}`;
    }
  }
};
</script>

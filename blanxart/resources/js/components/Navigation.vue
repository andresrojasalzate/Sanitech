<template>
  <nav :class="['navbar', 'navbar-expand-lg', 'navbar-light', 'fixed-top', userRoleClass]">
    <div class="container">
      <div class="navbar-brand" to="/">
        <div class="logo"></div>
        Sanitech
      </div>
      <button class="navbar-toggler icon" type="button" @click="toggleNavbar">
        <i class="fas fa-bars"></i>
      </button>
      <div :class="['collapse', { 'show': isNavbarOpen }]" class="navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Inicio</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'paciente'">
            <a class="nav-link" :href="'/agenda/' + userData.id">Agenda</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'paciente'">
            <a class="nav-link" href="/citas">Citas</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'paciente'">
            <a class="nav-link" href="">Solicitudes</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'paciente'">
            <a class="nav-link" :href="'/notificaciones/' + userData.id">Notificaciones</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'medico'">
            <a class="nav-link" href="/buscadorPacientes">Pacientes</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'admin'">
            <a class="nav-link" href="">Tareas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  props: ['userData'],
  data() {
    return {
      isNavbarOpen: false
    };
  },
  methods: {
    toggleNavbar() {
      this.isNavbarOpen = !this.isNavbarOpen;
    }
  },
  computed: {
    userRoleClass() {
      // Retorna la clase correspondiente al rol del usuario
      return this.userData.rol === 'paciente' ? 'navbar-paciente' :
             this.userData.rol === 'medico' ? 'navbar-medico' :
             this.userData.rol === 'administrador' ? 'navbar-admin' :
             '';
    }
  },
  mounted() {
    console.log(this.userData.rol);
  }
};
</script>


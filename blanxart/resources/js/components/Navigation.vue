<template>
  <nav :class="['navbar navbar-expand-lg navbar-light fixed-top', userRoleClass]">
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
            <a class="nav-link" href="/home/">Inici</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'paciente'">
            <a class="nav-link" :href="'/agenda/' + userData.id">Agenda</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'paciente'">
            <a class="nav-link" :href="'/informesClinicos/' + userData.id">Resultats</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'paciente'">
            <a class="nav-link" :href="'/solicitudes/' + userData.id">Solicituts</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'paciente'">
            <a class="nav-link" :href="'/notificaciones/' + userData.id">Notificacions</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'admin'">
            <a class="nav-link" href="">Tareas</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'admin'">
            <a class="nav-link" href="">Agenda dels metges</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout/">Logout</a>
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
          this.userData.rol === 'admin' ? 'navbar-admin' :
            '';
    }
  },
  mounted() {
    console.log(this.userData);
  }
};
</script>

<style></style>

<template>
  <nav :class="['navbar', userRoleClass]">
    <div class="container">
      <div class="top-container">
        <div class="navbar-brand" @click="navigateTo('/')">
          <div class="logo"></div>
          Sanitech
        </div>
        <button class="navbar-toggler icon" type="button" @click="toggleNavbar" v-if="isMobile">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <div :class="[{ 'collapse': isMobile }, { 'show': isNavbarOpen }, { 'show-mobile': isMobile && isNavbarOpen }]"
        class="navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Inicio</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'paciente'">
            <a class="nav-link" :href="'/agenda/' + userData.id">Agenda</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'paciente'">
            <a class="nav-link" :href="'/citas'">Citas</a>
          </li>
          <li class="nav-item" v-if="userData.rol === 'paciente'">
            <a class="nav-link" :href="''">Solicitudes</a>
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
      isNavbarOpen: false,
      isMobile: false
    };
  },
  methods: {
    toggleNavbar() {
      this.isNavbarOpen = !this.isNavbarOpen;
    },
    navigateTo(path) {
      // Implementa la navegación a la ruta especificada
      // Puedes usar Vue Router o simplemente window.location.href = path;
      console.log('Navigating to:', path);
    },
    checkMobile() {
      // Verifica si la pantalla es móvil
      this.isMobile = window.innerWidth <= 1000; // Cambiar el ancho según tus necesidades
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
    // Verificar si es una pantalla móvil cuando el componente se monta
    this.checkMobile();
    // Verificar si es una pantalla móvil al cambiar el tamaño de la ventana
    window.addEventListener('resize', this.checkMobile);
  },
  beforeDestroy() {
    // Eliminar el oyente de eventos cuando el componente se destruye
    window.removeEventListener('resize', this.checkMobile);
  }
};
</script>

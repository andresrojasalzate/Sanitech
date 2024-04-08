<template>
    <nav class="navbar navbar-expand-lg navbar-light">
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
            <li class="nav-item">
              <a class="nav-link" href="/agenda">Agenda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/citas">Citas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Solicitudes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/notificaciones">Notificaciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    data() {
      return {
        isNavbarOpen: false
      };
    },
    methods: {
      toggleNavbar() {
        this.isNavbarOpen = !this.isNavbarOpen;
      }
    }
  };
  </script>
  
  <style>

</style>

  
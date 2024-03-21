<template>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        
        
        <div class="navbar-brand" to="/">
            <div class="logo"></div>
            Blanxart
        </div>
        <button class="navbar-toggler icon" type="button" @click="toggleNavbar">
          <i class="fas fa-bars"></i>
        </button>
        <div :class="['collapse', { 'show': isNavbarOpen }]" class="navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Agenda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Citas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Solicitudes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Notificaciones</a>
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
.navbar {
  background-color: #434371;
}



.container{
    padding: 0;
}
.navbar-brand {
    display: flex;
    align-items: center;
  font-weight: bold; 
  color:white;
}

.nav-link {
  color: #FFFFFF; 
  
}

.navbar-nav .nav-link:hover {
    color: white;
}


.nav-item:hover {
  background-color: #36369F;
  cursor:pointer; 

}

.navbar-toggler {
  color: #FFFFFF; 
}

.icon{
    font-size: 2rem;
}

.logo{
    width: 2rem;
    height: 2rem;
    background-color: white;
    margin-right: 1rem;
}

@media (max-width: 991.98px) {
  .navbar-nav {
    flex-direction: column; 
  }
  .navbar-nav .nav-item {
    margin-bottom: 5px; 
  }

  .navbar-brand {
  font-weight: bold; 
  padding:1rem;
}

.nav-link {
  color: #FFFFFF; 
  padding: 1rem;
}
}
</style>

  
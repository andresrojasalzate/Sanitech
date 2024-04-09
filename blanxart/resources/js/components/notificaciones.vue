<template>
    <div class="notificaciones-container">
      <div v-for="item in notificaciones" :key="item.id" class="notificacion-card">
        <div class="notificacion-content">
          <div class="notificacion-header">
            <h3>{{ item.title }}</h3>
          </div>
          <div class="notificacion-body">
            <p>{{ item.affair }}</p>
            <p>{{ item.descripcion }}</p>
          </div>
        </div>
        <div class="fecha">{{ formatCreatedAt(item.created_at) }}</div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: ['notificaciones'],
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
      }
    }
  };
  </script>
  
  
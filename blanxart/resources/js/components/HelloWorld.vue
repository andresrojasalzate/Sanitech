<template>
    <div class="hello">
      <h1>{{ greeting }}</h1>
      <p>This is a Vue component!</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        greeting: 'Hello, world!'
      };
    }
  }
  </script>
  
  <style scoped>
  .hello {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
  }
  </style>
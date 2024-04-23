<template>
    <div>
      <h2>Llistat de Cites</h2>
      <table>
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
            
          <tr class="table-row" v-for="(cita, index) in citas" :key="index" @click="navigateToDetailPage(cita)">
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
  </template>
  
  <script>
  export default {
    props: {
      citas: Array,
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
      console.log(cita);
    }
    }
  };
  </script>
  
  <style>
  table {
    width: 100%;
    border-collapse: collapse;
  }
  
  table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  table th {
    background-color: #f2f2f2;
    font-weight: bold;
  }
  
  table tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  
  table tr:hover {
    background-color: #ddd;
    cursor: pointer;
  }
  </style>
  
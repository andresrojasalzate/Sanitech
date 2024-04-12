import { createApp } from 'vue';
import HelloWorld from './components/HelloWorld.vue';
import Navigation from './components/Navigation.vue';
import agenda from './components/agenda.vue';
import informesClinicos from './components/InformeClinico.vue';
import notificacionesComponent from './components/notificaciones.vue';
import buscadorPaciente from './components/FiltradorPacientes.vue';

const citas = createApp({});
citas.component('citas-component', agenda);
citas.mount("#agenda");
createApp(Navigation).mount("#app");

const notificaciones = createApp({});
notificaciones.component('notificaciones-component', notificacionesComponent);
notificaciones.mount("#notificaciones");

const informes = createApp({});
informes.component('informes-component', informesClinicos);
informes.mount('#informesClinicos');

// const buscador = createApp({});
// buscador.component('buscadorPaciente-component', buscadorPaciente);
// buscador.mount('#buscadorPacientes');

createApp(buscadorPaciente).mount("#buscadorPacientes");

import { createApp } from 'vue';

import HelloWorld from './components/HelloWorld.vue';
import Navigation from './components/Navigation.vue';
import agenda from './components/agenda.vue';
import informesClinicos from './components/InformeClinico.vue';
import notificacionesComponent from './components/notificaciones.vue';
import justificanteComponent from './components/Justificante.vue';
import buscadorPaciente from './components/FiltradorPacientes.vue';
import PedirCitaComponent from './components/PedirCita.vue';

const citas = createApp({});
citas.component('citas-component', agenda);
citas.mount("#agenda");

const navegacion = createApp({});
navegacion.component('navegacion-component', Navigation);
navegacion.mount("#app");

const notificaciones = createApp({});
notificaciones.component('notificaciones-component', notificacionesComponent);
notificaciones.mount("#notificaciones");

const informes = createApp({});
informes.component('informes-component', informesClinicos);
informes.mount('#informesClinicos');

const justificante = createApp({});
justificante.component('justificante-component', justificanteComponent);
justificante.mount('#justificante');

const pedirCita = createApp({});
pedirCita.component('pedircita-component', PedirCitaComponent);
pedirCita.mount('#pedircita');

createApp(buscadorPaciente).mount("#buscadorPacientes");
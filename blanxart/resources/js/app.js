import { createApp } from 'vue';

import Navigation from './components/Navigation.vue';
import agenda from './components/agenda.vue';
import informesClinicos from './components/InformeClinico.vue';
import notificacionesComponent from './components/notificaciones.vue';
import justificanteComponent from './components/Justificante.vue';
import buscadorPaciente from './components/FiltradorPacientes.vue';
import PedirCitaComponent from './components/PedirCita.vue';
import crearCita from './components/CrearCita.vue';
import citasSinAsignar from './components/citasSinAsignar.vue';
import BuscadorMedico from './components/BuscadorMedico.vue';
import AgendaMedico from './components/AgendaMedico.vue';
import agendarCita from './components/agendarCita.vue';
import reprogramarCitas from './components/reprogramarCitas.vue';
import AlertaExito from './components/AlertaExito.vue';
import listaCambioMedico from './components/listaCambioMedico.vue';

const citas = createApp({});
citas.component('citas-component', agenda);
citas.mount("#agenda");

const listadoCambioMedico = createApp({});
listadoCambioMedico.component('listado-component', listaCambioMedico);
listadoCambioMedico.mount('#listadoCambioMedico')

const asignarCita = createApp({});
asignarCita.component('asignar-citas-component', citasSinAsignar);
asignarCita.mount("#asignarCita");

const reprogramarCita = createApp({});
reprogramarCita.component('reprogramar-citas-component', reprogramarCitas);
reprogramarCita.mount("#reprogramarCita");

const agendarCitaPaciente = createApp({});
agendarCitaPaciente.component('agendar-citas-component', agendarCita);
agendarCitaPaciente.mount("#agendarCita");

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
pedirCita.component('selecciondia-component', PedirCitaComponent);
pedirCita.mount('#formPedirCita');

const buscador = createApp({});
buscador.component('buscadorpaciente-component', buscadorPaciente);
buscador.mount('#buscadorPacientes');

const nuevaCita = createApp({});
nuevaCita.component('seleccionprueba-component', crearCita);
nuevaCita.mount('#formCrearCita');


//componente buscador de medicos de los administrativos

const buscadorMedico = createApp({});
buscadorMedico.component('buscadormedico', BuscadorMedico);
buscadorMedico.mount('#buscadorMedicos');

//componente para mostrar las citas de la agenda del medico siendo admin
const agendaMedico = createApp({});
agendaMedico.component('agendamedico', AgendaMedico);
agendaMedico.mount('#agendaMedico');

//componente para mostrar aletra de exito

const aletraExito = createApp({});
aletraExito.component('aletraexito', AlertaExito);
aletraExito.mount('#alertaExito');


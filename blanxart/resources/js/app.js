import { createApp } from 'vue';
import HelloWorld from './components/HelloWorld.vue';
import Navigation from './components/Navigation.vue';
import agenda from './components/agenda.vue';
import informesClinicos from './components/InformeClinico.vue';

const app = createApp({});
app.component('citas-component', agenda);
createApp(Navigation).mount("#app");
app.mount("#agenda");

const informes = createApp({});
informes.component('informes-component', informesClinicos);
informes.mount('#informesClinicos');

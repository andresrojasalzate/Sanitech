import { createApp } from 'vue';
import HelloWorld from './components/HelloWorld.vue';
import Navigation from './components/Navigation.vue';
import citas from './components/citas.vue';
import informesClinicos from './components/InformeClinico.vue';

const app = createApp({});
const informes = createApp({});
app.component('citas-component', citas);
app.component('informes-component', informesClinicos);
createApp(Navigation).mount("#app");
app.mount("#citas");
app.mount("#informesClinicos");
//createApp(informesClinicos).mount('#informesClinicos')

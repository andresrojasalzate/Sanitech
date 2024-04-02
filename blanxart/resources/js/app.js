import { createApp } from 'vue';
import HelloWorld from './components/HelloWorld.vue';
import Navigation from './components/Navigation.vue';
import citas from './components/citas.vue';

const app = createApp({});
app.component('citas-component', citas);
createApp(Navigation).mount("#app");
app.mount("#citas");

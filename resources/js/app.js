import './bootstrap';
import { createApp } from 'vue';

// If you have a Vue component, import it:
import ExampleComponent from './components/ExampleComponent.vue';

// Create the Vue app and mount it to an element with id="app"
const app = createApp({});
app.component('example-component', ExampleComponent);
app.mount('#app');
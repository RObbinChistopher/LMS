import './bootstrap.js';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router.js';
import store from './store/index.js';
import '../css/app.css'; // Relative path to `app.css`
import Vue3IconPicker from 'vue3-icon-picker'
import 'vue3-icon-picker/dist/style.css'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import VueTelInput from 'vue-tel-input';
import 'vue-tel-input/vue-tel-input.css';
const app = createApp(App);
app.use(store);
app.use(router);
app.use(Vue3IconPicker);
app.use(VueSweetalert2);
app.use(VueTelInput);
app.mount('#app');

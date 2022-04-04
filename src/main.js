import { createApp } from 'vue'
import App from './App.vue'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import router from './router'
import store from './store'

createApp(App).use(VueSweetalert2).use(store).use(router).mount('#app')
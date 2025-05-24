import { createApp } from 'vue'
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate' // в ls соранить
import Toast from 'vue-toastification' // красивая анимация
import 'vue-toastification/dist/index.css'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

const app = createApp(App)
const pinia = createPinia()

pinia.use(piniaPluginPersistedstate)

app.use(pinia) // пиния для соххранения данных в состоянии
app.use(router)
app.use(Toast)

app.mount('#app')

axios.defaults.baseURL = 'http://localhost:8000'

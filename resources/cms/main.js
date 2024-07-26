
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import { createApp } from 'vue';
import globalComponents from '../cms/src/global-components'; 
import vueConfig from '../../vue.config'; 
import router from './router/main';
import App from './components/App.vue';

const app = createApp(App);

globalComponents(app);
// Đăng ký biến toàn cục
app.provide('baseURL', vueConfig.apiUrl || '/');


app.use(router); // Sử dụng Vue Router
app.mount('#app');

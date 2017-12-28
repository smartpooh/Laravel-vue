import Vue from 'vue';
import App from './App.vue';
import axios from './axios';
import store from './store';
import router from './router'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-default/index.css';
import './plugins/jquery.form.min.js';
import { Message } from 'element-ui';
import { sync  } from 'vuex-router-sync';

Vue.use(ElementUI);

//方便axios调用
Vue.prototype.$http = axios;

//路由和store同步
sync(store, router); 

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
}).$mount('#app');

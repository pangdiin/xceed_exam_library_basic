

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

require('./bootstrap');
window.Vue = require('vue');

import App from './App.vue';
import VueRouter from 'vue-router';
import {routes} from './routes';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});
require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)
import routes from './routes';

//sweet alert 2
import VueSweetalert2 from 'vue-sweetalert2';
window.Swal = require('sweetalert2');
Vue.use(VueSweetalert2);
import utils from './helpers/utilities'
Vue.prototype.$utils = utils;

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});

require('./bootstrap');

window.Vue = require('vue');
var Vue = require('vue');
Vue.use(require('vue-resource'));

Vue.component('employees-component', require('./components/Employees.vue'));

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

const app = new Vue({
    el: '#app'
})
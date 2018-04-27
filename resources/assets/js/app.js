
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
import store from './store.js'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('top-component', require('./components/TopComponent.vue'));
Vue.component('panel-component', require('./components/PanelComponent.vue'));
Vue.component('box-component', require('./components/BoxComponent.vue'));
Vue.component('page-component', require('./components/PageComponent.vue'));
Vue.component('table-list-component', require('./components/TableListComponent.vue'));
Vue.component('breadcrumb-component', require('./components/BreadcrumbComponent.vue'));
Vue.component('modal-component', require('./components/modal/ModalComponent.vue'));
Vue.component('modal-link-component', require('./components/modal/ModalLinkComponent.vue'));
Vue.component('form-component', require('./components/FormComponent.vue'));
const app = new Vue({
    el: '#app',
    store,
    mounted: () => {
        document.getElementById('app').style.display = "block";
    }
});

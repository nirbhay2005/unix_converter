/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('nav-bar', require('./components/Homepage/NavBar.vue').default);
Vue.component('clock', require('./components/Homepage/HeaderClock.vue').default);
Vue.component('epoch-to-human', require('./components/Homepage/EpochToHuman.vue').default)
Vue.component('date-to-epoch', require('./components/Homepage/DateToEpoch.vue').default)
Vue.component('human-date-to-epoch', require('./components/Homepage/HumanDateToEpoch.vue').default)
Vue.component('begin-end', require('./components/Homepage/BeginEndDate.vue').default)
Vue.component('menu-list', require('./components/Homepage/MenuList.vue').default)

Vue.component('pref-form', require('./components/Preferences/PreferenceForm.vue').default)
Vue.mixin('setPref', require('./mixins/SetPreference.js').default)
;/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
        el: '#app',
    });

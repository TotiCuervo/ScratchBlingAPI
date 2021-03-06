/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';

import VueJsonPretty from 'vue-json-pretty'
Vue.use(VueJsonPretty);

import VueClipboard from 'vue-clipboard2'
Vue.use(VueClipboard);

import VueTextareaAutosize from 'vue-textarea-autosize'
Vue.use(VueTextareaAutosize);



const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('endpoint-playground-2', require('./components/Version 2.0/EndpointPlayground2').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');
import moment from 'vue-moment'
import Vue from 'vue'
import vSelect from 'vue-select'
import VueTrix from 'vue-trix'
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('likes', require('./components/LikeComponent.vue').default);
Vue.component('user', require('./components/UserComponent.vue').default);
Vue.component('users', require('./components/Users.vue').default);
Vue.component('subscribe', require('./components/Subscribe.vue').default);
Vue.component('textarea2', require('./components/Emoji.vue').default);
Vue.component('comments', require('./components/textEmoji.vue').default);
Vue.component('comment', require('./components/Comment.vue').default);
Vue.component('richtextbox', VueTrix);
Vue.component('post-form', require('./components/PostForm.vue').default);
Vue.component('chat-app', require('./components/ChatApp.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});




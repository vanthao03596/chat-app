
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// Vue.use(require('vue-moment'));
Vue.use(require('vue-moment'));
import VueProgressBar from 'vue-progressbar';

const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'left',
    inverse: false
}
Vue.use(VueProgressBar, options)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));
Vue.component('chat-log', require('./components/Chatlog.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('list-user', require('./components/ListUser.vue'));
Vue.component('App', require('./components/App.vue'));
import router from './routes/index'

new Vue({
    el: '#app',
    router,

})

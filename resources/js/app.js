/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

window.Vue = require('vue');

import policies from "./policies";

Vue.prototype.authorize = function (policy, model){

    if(! window.Auth.signedIn) return false;

    const user = window.Auth.user;

    return policies[policy](user, model);
}

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('vue-login', require('./components/Login.vue').default);
Vue.component('vue-register', require('./components/Register.vue').default);
Vue.component('vue-message', require('./components/Message.vue').default);
Vue.component('vue-answer', require('./components/Answer.vue').default);
Vue.component('vue-answers', require('./components/Answers.vue').default);
Vue.component('vue-thread', require('./components/Thread.vue').default);
Vue.component('vue-threads', require('./components/Threads.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    data: {
        newAnswer: null,
    },
    methods: {
        logout() {
            axios.post('/logout', )
                .then(response => {
                     location.reload();
                })
        },
        addNewAnswer (answerObj) {
            this.newAnswer = answerObj;
        }
    }
});

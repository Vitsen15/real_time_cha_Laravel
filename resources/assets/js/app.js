/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('message', require('./components/MessageComponent.vue'));
Vue.component('sent-message', require('./components/SendMessageComponent.vue'));

const app = new Vue({
    el: '#app',
    data() {
        return {
            messages: []
        }
    },
    mounted() {
        this.fetchMessages();
        window.Pusher.logToConsole = true;

        window.Echo.private('chat')
            .listen(".App.Events.MessageSentEvent", function (e) {
                this.messages.push({
                    message: e.message.message,
                    user: e.user
                });
                console.log('hui');
            });
    },

    methods: {
        addMessage(message) {
            this.messages.push(message);
            axios.post('/messages', message);
        },

        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        }
    }
});

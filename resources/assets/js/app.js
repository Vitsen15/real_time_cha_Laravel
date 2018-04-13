/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.BootstrapVue = require('bootstrap-vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueRouter from 'vue-router';
import ChatComponent from './components/chat/ChatComponent';

// Profile page components
import ProfileComponent from './components/profile/ProfileComponent';

//Children profile components
import OverviewComponent from './components/profile/PfofileMenuComponents/OverviewComponent';
import SettingsComponent from './components/profile/PfofileMenuComponents/SettingsComponent';
import HelpComponent from './components/profile/PfofileMenuComponents/HelpComponent';

Vue.use(VueRouter);

Vue.component('chat-component', ChatComponent);
Vue.component('profile-component', ProfileComponent);

let router = new VueRouter({
    routes: [
        {path: '/chat', component: ChatComponent},

        {
            path: '/profile', component: ProfileComponent,

            children: [
                {path: '/overview', component: OverviewComponent},

                {path: '/settings', component: SettingsComponent},

                {path: '/help', component: HelpComponent}
            ]
        }
    ],

    mode: 'history'
});

const app = new Vue({
    el: '#app',
    router: router
});

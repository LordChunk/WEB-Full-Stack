import Vue from "vue";

// Components
import Nav from "../components/Nav.vue"
import Home from "../components/Home.vue"
import Login from "../components/Login.vue"

// Plugins
import vuetify from './plugins/vuetify'
import router from './plugins/router'

require('./bootstrap.js')

Vue.component('navigation', Nav);
Vue.component('home', Home);
Vue.component('login', Login);

router.addRoutes([
    {
        path: '/',
        component: Home,
    },
    {
        path: '/login',
        component: Login,
    }
]);

const app = new Vue({
    vuetify,
    router,
    el: '#vue-app',
    components: {
        Nav
    },

    // Navigation drawer triggers
    data: () => ({
        drawer: false,
        group: null,
    }),
    watch: {
        group() {
            this.drawer = false
        },
    },
})

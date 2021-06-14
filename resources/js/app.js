import Vue from "vue";
import Nav from "../components/Nav.vue"
import vuetify from './plugins/vuetify'

require('./bootstrap.js')

Vue.component('navigation', Nav);

const app = new Vue({
    vuetify,
    el: '#vue-app',
    components: {
        Nav
    },
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

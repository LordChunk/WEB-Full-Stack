import Vue from "vue";
import Nav from  "../components/Nav.vue"

require('./bootstrap.js')

Vue.component('navigation', Nav);

const app = new Vue({
    el: '#vue-app',
    components: {
        Nav
    }
})

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const opts = {
    mode: 'history',
}

export default new VueRouter(opts)

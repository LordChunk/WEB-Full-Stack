require('./bootstrap');

import Vue from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue';

// Plugins
import { ZiggyVue } from 'ziggy';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import OrderPlugin from '@/Plugins/order-plugin';

// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Activate plugins
Vue.use(ZiggyVue);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(OrderPlugin);

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, app, props }) {
    new Vue({
      render: h => h(app, props),
    }).$mount(el)
  },
})

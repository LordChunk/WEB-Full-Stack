require('./bootstrap');

import Vue from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue';

// Plugins
import { ZiggyVue } from 'ziggy';
import StatePlugin from '@/Plugins/state-plugin';
import OrderPlugin from '@/Plugins/order-plugin';


// Activate plugins
Vue.use(ZiggyVue);
Vue.use(StatePlugin);
Vue.use(OrderPlugin);

createInertiaApp({
  resolve: name => require(`./Pages/${name}`),
  setup({ el, app, props }) {
    new Vue({
      render: h => h(app, props),
    }).$mount(el)
  },
})

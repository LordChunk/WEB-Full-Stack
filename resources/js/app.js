require('./bootstrap');

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

import VueI18n from 'vue-i18n';

// Plugins
import { ZiggyVue } from 'ziggy';
import StatePlugin from '@/Plugins/state-plugin';
import OrderPlugin from '@/Plugins/order-plugin';

// Inertia lnk
import { InertiaLink } from '@inertiajs/inertia-vue3'

InertiaProgress.init()

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(StatePlugin)
            .use(OrderPlugin)
            .component('inertia-link', InertiaLink)
            .mount(el)
    },
})

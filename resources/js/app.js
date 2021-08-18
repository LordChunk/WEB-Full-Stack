require('./bootstrap');

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

// Plugins
import { ZiggyVue } from 'ziggy';
import AuthPlugin from '@/Plugins/auth-plugin';
import TranslationPlugin from '@/Plugins/translation-plugin.js';
import PriceFormattingPlugin from '@/Plugins/price-formatting-plugin';
import OrderPlugin from '@/Plugins/order-plugin';
import EnvironmentPlugin from '@/Plugins/environment-plugin';

// Inertia lnk
import { InertiaLink } from '@inertiajs/inertia-vue3'

InertiaProgress.init()

createInertiaApp({
    resolve: name => import(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(AuthPlugin)
            .use(TranslationPlugin)
            .use(PriceFormattingPlugin)
            .use(OrderPlugin)
            .use(EnvironmentPlugin)
            .component('inertia-link', InertiaLink)
            .mount(el)
    },
})

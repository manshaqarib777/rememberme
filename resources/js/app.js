// import './bootstrap';
//

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

import 'vuetify/dist/vuetify.css';
import vuetify from "./vuetify";

import 'vue3-toastify/dist/index.css';
import Vue3Toastify from 'vue3-toastify';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';




createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(vuetify)
            .use(ZiggyVue)
            .use(Vue3Toastify, {
                autoClose: 3000, // default is 5000
                position: 'top-right', // default is top-right
            })
            .mount(el);
    },

    progress: {
        progress: true,
        color: '#09d',
    },
});

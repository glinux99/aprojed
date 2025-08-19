import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import SummernoteEditor from 'vue3-summernote-editor';
// resources/js/app.js
// AJOUTER JQUERY ICI
// import 'summernote/dist/summernote-lite.css';
// ... le reste de votre fichier app.js
import jQuery from 'jQuery'
window.jQuery = jQuery
const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component('SummernoteEditor', SummernoteEditor)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

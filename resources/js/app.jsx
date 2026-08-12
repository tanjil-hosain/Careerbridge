import '../css/app.css';
import './bootstrap';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap-icons/font/bootstrap-icons.css';

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

import { createInertiaApp, router } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const showToasts = (props) => {

    const flash = props?.flash;
    const errors = props?.errors;

    if (flash?.success) {
        toastr.success(flash.success);
    }

    if (flash?.error) {
        toastr.error(flash.error);
    }

    if (errors && Object.keys(errors).length > 0) {

        Object.values(errors).forEach((error) => {
            toastr.error(error);
        });

    }
};

createInertiaApp({

    title: (title) => `${title} - ${appName}`,

    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob('./Pages/**/*.jsx'),
        ),

    setup({ el, App, props }) {

        const root = createRoot(el);

        // Initial page
        showToasts(props);

        // Every Inertia navigation
        router.on('navigate', (event) => {
            showToasts(event.detail.page.props);
        });

        root.render(<App {...props} />);
    },

    progress: {
        color: '#4B5563',
    },

});
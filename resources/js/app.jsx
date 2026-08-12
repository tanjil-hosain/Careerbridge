import '../css/app.css';
import './bootstrap';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'bootstrap-icons/font/bootstrap-icons.css';

import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

import { createInertiaApp, usePage } from '@inertiajs/react';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';
import { useEffect } from 'react';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';


function ToastHandler() {

    const { flash, errors } = usePage().props;

    useEffect(() => {

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

    }, [flash, errors]);


    return null;
}


createInertiaApp({

    title: (title) => `${title} - ${appName}`,

    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob('./Pages/**/*.jsx'),
        ),

    setup({ el, App, props }) {

        const root = createRoot(el);

        root.render(
            <>
                <App {...props} />

                <ToastHandler />
            </>
        );
    },

    progress: {
        color: '#4B5563',
    },

});
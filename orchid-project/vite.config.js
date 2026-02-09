import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/bootstrap.min.css',
                'resources/css/swiper-bundle.css',
                'resources/css/nice-select.css',
                'resources/css/magnific-popup.css',
                'resources/css/font-awesome-pro.css',
                'resources/css/spacing.css',
                'resources/css/main.css'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});

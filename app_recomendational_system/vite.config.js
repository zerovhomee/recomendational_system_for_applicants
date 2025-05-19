import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/style_page_1.css',
                'resources/js/script_page_1.js',
                'resources/css/style_page_2.css',
                'resources/js/script_page_2.js',
                'resources/css/style_page_3.css',
                'resources/js/script_page_3.js',
            ],
            refresh: true,
        }),
    ],
});

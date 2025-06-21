import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/main_page.css',
                'resources/js/main_page.js',
                'resources/css/test.css',
                'resources/js/test.js',
                'resources/css/result.css',
                'resources/js/result.js',
                'resources/css/auth.css',
                'resources/css/reg.css',
                'resources/css/personal_account.css',
                'resources/js/personal_account.js',
                'resources/css/test.css'
            ],
            refresh: true,
        }),
    ],
});

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        cors: true,
        host: true,
        hmr: {
            host: process.env.VITE_HOST || 'vite.elkdesignn.test',
            clientPort: 443,
            protocol: 'wss',
        },
        allowedHosts: ['localhost', '127.0.0.1', 'elkdesignn.test', 'vite.elkdesignn.test'],
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});

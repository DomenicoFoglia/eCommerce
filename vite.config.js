import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.jsx'], // <-- cambia in .jsx
            refresh: true,
        }),
        tailwindcss(),
        react(), // <-- aggiungi React
    ],
    server: {
        proxy: {
            // proxy tutte le chiamate /api al server Laravel
            '/api': 'http://127.0.0.1:8000',
        },
    },
});
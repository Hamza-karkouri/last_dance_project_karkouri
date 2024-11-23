import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';  // React plugin for JSX support

export default defineConfig({
    plugins: [
        react(),  // React plugin for JSX support
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.jsx'],  // Adjust to .jsx or .tsx
            refresh: true,
        }),
    ],
});

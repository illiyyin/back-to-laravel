import { defineConfig } from 'vite'
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import livewire from '@defstudio/vite-livewire-plugin';
 
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
            ],
        }),
        livewire({  // Here we add it to the plugins
            refresh: ['resources/css/app.css'],
        }),
    ],
})
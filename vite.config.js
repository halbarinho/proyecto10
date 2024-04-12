import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
//AÑADIDO PARA PODER USAR VUE
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/vueJs/questionaireSlider.js',
                'resources/js/vueJs/notificationMenu.js',
            ],
            refresh: true,
        }),
        //AÑADIDO PARA USAR VUE
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});

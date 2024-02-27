import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import i18n from 'laravel-vue-i18n/vite';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),

        vue({ 
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),

        

        i18n(),

    ],

    resolve: { 
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
            'routeHelper': path.resolve(__dirname, 'resources/js/helper/routeHelper.js'),
            'helper': path.resolve(__dirname, 'resources/js/helper/helper.js'),
            'helperFunction': path.resolve(__dirname, 'resources/js/helper/helperFunction.js'),
        },
    },
    
});
